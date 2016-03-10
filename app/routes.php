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
Route::get('/logout', "MainController@logout");
Route::get('/login', "MainController@index");
Route::get('/register', "UsersController@create");
Route::get('/forgot', "UsersController@forgot");
Route::get('/verify/{verification}/{email}', "UsersController@verify");

Route::post('/update', "MainController@update");
Route::post('/send', "UsersController@send");
Route::resource('main', 'MainController');
Route::resource('users', 'UsersController');

Route::get('mainpage', function() {
    return "The is the main page";
});