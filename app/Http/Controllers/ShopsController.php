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
     // *  and get connected user.
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


    public function nearby()
    {
      $nearbys   = $this->getNearBy();
      $favorites = $this->getFavorite();
      $dislikes  = $this->getDislike();

      $shopsWithoutFavorites = $nearbys->diff($favorites);
      $shopsWithoutLastDislikes = $shopsWithoutFavorites->diff($dislikes);


    return $shopsWithoutLastDislikes;
    }


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

    function getFavorite()
    {
      $favorites = $this->user->favorites;
      $shops = collect();
      $favorites->map( function($value,$key) use ($shops) {
          $shops->push($value->shop);
      });

    return $shops;
    }

    function getDislike()
    {
      $dislikes = $this->user->dislikes->where('created_at', '>' , Carbon::now()->subHours(2));
      $shops = collect();
      $dislikes->map( function($value,$key) use ($shops) {
          $shops->push($value->shop);
      });

    return $shops;
    }

    function setFavorite(Request $request)
    {
      $favorite = new Favorite();
      $favorite->user_id         = $this->user->id;
      $favorite->shop_id         = $request->shop_id;
      $insert  = $favorite->save();

    return Response::json(['message' => 'Shop added to favorite'], 200);
    }

    public function unsetFavorite(Request $request)
    {
      $favorite = Favorite::where('shop_id', $request->shop_id)->first();
      Favorite::destroy($favorite->id);

    return Response::json(['message' => 'Shop removed from favorite'], 200);
    }

    function setDislike(Request $request)
    {

      $dislike = new Dislike();
      $dislike->user_id         = $this->user->id;
      $dislike->shop_id         = $request->shop_id;
      $insert  = $dislike->save();

    return Response::json(['message' => 'Shop disliked'], 200);
    }
}
