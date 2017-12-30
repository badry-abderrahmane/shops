<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mongo', function () {
    // $shops = App\Shop::all();
    // dd($shops);

    $shops =  App\Shop::where('location', 'near', [
    	'$geometry' => [
            'type' => 'Point',
      	    'coordinates' => [
      	        -6.81134,
                  33.94514,
              ],
        ],
        '$maxDistance' => 1000  ,
    ])->get();
    dd($shops);
});
