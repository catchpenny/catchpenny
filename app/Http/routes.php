<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard','DashboardController@index');
Route::get('home','HomeController@index');

// Api Get Requests
Route::get('api/image/{id}','Api\ImageController@index');
Route::get('api/profile','Api\ProfileController@index');
Route::get('api/follow/add/{id}','Api\ProfileController@addFollower');
Route::get('api/follow/remove/{id}','Api\ProfileController@removeFollower');

// Api Post Requests
Route::post('api/post/create/','Api\PostController@create');

// Api Profile Requests
Route::get('profile','ProfileController@index');
Route::get('profile/edit','ProfileController@edit');
Route::get('profile/{userId}','ProfileController@show');
Route::post('profile/edit','ProfileController@update');

// Login routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

