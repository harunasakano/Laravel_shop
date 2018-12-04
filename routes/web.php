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

Route::get('/','ShoppingController@top');
Route::get('/search','ShoppingController@search');
Route::get('/item','ShoppingController@item');
Route::get('/cart','ShoppingController@cart');
Route::get('/confirm','ShoppingController@confirm');
Route::get('/complete','ShoppingController@complete');