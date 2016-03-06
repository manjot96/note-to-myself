<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', "MainController@index");
Route::get('/2', "MainController@index2");
Route::get('/3', "MainController@index3");
Route::resource('main', 'MainController');