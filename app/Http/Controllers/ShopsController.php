<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Favorite;
use App\Dislike;

use Illuminate\Http\Request;
use Carbon\Carbon;

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

      $shops = $nearbys->diff($favorites);
      $shops2 = $shops->diff($dislikes);

    return $shops->all();
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
      $dislikes = $this->user->dislikes->where('created_at', '<' , Carbon::now()->subHours(2));
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

    return $insert;
    }

    function setDislike(Request $request)
    {
      Favorite::destroy($request->id);

      $dislike = new Dislike();
      $dislike->user_id         = $this->user->id;
      $dislike->shop_id         = $request->shop_id;
      $insert  = $dislike->save();

    return $insert;
    }
}
