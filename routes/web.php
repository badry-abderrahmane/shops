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


// *
// * Authentification routes : login, resgister, logout
// *
Auth::routes();


// *
// * Route home to let the fabulous VueJs take the wheel
// *
Route::get('/home', 'HomeController@index')->name('home');


// *
// * Route to get the list of all nearby shops
// *
Route::get('/shops/nearby', 'ShopsController@nearby')->name('nearby');


// *
// * Route to get the list of user favourite shops
// *
Route::get('/shops/favorite', 'ShopsController@getFavorite')->name('favorite');


// *
// * Route to store new favorite shop
// *
Route::post('/shops/favorite', 'ShopsController@setFavorite')->name('favorite');


// *
// * Route to store new dislike shop
// *
Route::post('/shops/dislike', 'ShopsController@setDislike')->name('favorite');
