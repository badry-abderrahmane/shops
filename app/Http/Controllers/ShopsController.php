<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Favorite;
use App\Dislike;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class ShopsController extends Controller
{
    protected $user;
     // *
     // * Instantiate a new controller instance
     // *  and get connected  user.
     // *
     // * @return void
     // *
    public function __construct()
    {
      $this->middleware(function ($request, $next) {
          $this->user= \Auth::user();
          return $next($request);
      });
    }

    // *
    // *  Get Combined collection of
    // *  shops without the shops in favorite.
    // *  and without the shops disliked the last hours
    // *
    // * @return collection
    // *
    public function nearby()
    {
      $nearbys   = $this->getNearBy();
      $favorites = $this->getFavorite();
      $dislikes  = $this->getDislike();

      $shopsWithoutFavorites = $nearbys->diff($favorites);
      $shopsWithoutLastDislikes = $shopsWithoutFavorites->diff($dislikes);


    return $shopsWithoutLastDislikes;
    }

    // *
    // *  Get the collection of nearby
    // *  shops based on a given location
    // *
    // * @return collection
    // *
    function getNearBy()
    {
      $shops =  Shop::where('location', 'near', [
      	'$geometry' => [
              'type' => 'Point',
        	    'coordinates' => [
        	        -6.81134,
                    33.94514,
                ],
          ],
          '$maxDistance' => 1000  ,
      ])->get();

      return $shops;
    }

    // *
    // *  Get the collection of favorite
    // *  shops of the connected user
    // *
    // * @return collection
    // *
    function getFavorite()
    {
      $favorites = $this->user->favorites;
      $shops = collect();
      $favorites->map( function($value,$key) use ($shops) {
          $shops->push($value->shop);
      });

    return $shops;
    }

    // *
    // *  Get the collection of disliked
    // *  shops of the connected user
    // *
    // * @return collection
    // *
    function getDislike()
    {
      $dislikes = $this->user->dislikes->where('created_at', '>' , Carbon::now()->subHours(2));
      $shops = collect();
      $dislikes->map( function($value,$key) use ($shops) {
          $shops->push($value->shop);
      });

    return $shops;
    }

    // *
    // *  Set a new favorite shop
    // *  linking it to the connected user
    // *
    // * @return Json Response
    // *
    function setFavorite(Request $request)
    {
      $favorite = new Favorite();
      $favorite->user_id         = $this->user->id;
      $favorite->shop_id         = $request->shop_id;
      $insert  = $favorite->save();

    return Response::json(['message' => 'Shop added to favorite'], 200);
    }

    // *
    // *  Unset a favorite shop
    // *  Deleting it from favorite table
    // *
    // * @return Json Response
    // *
    public function unsetFavorite(Request $request)
    {
      $favorite = Favorite::where('shop_id', $request->shop_id)->first();
      Favorite::destroy($favorite->id);

    return Response::json(['message' => 'Shop removed from favorite'], 200);
    }

    // *
    // *  Set a new disliked shop
    // *  linking it to the connected user
    // *
    // * @return Json Response
    // *
    function setDislike(Request $request)
    {

      $dislike = new Dislike();
      $dislike->user_id         = $this->user->id;
      $dislike->shop_id         = $request->shop_id;
      $insert  = $dislike->save();

    return Response::json(['message' => 'Shop disliked'], 200);
    }
}
