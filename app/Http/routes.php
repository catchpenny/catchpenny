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

Route::get('temp','DashboardController@temp');
Route::get('dashboard','DashboardController@index');
Route::get('home','HomeController@index');

// Api Get Requests
Route::get('api/image/{id}','Api\ImageController@index');
Route::get('api/profile','Api\ProfileController@index');
Route::get('api/friend/request/{id}','Api\ProfileController@request');
Route::get('api/friend/remove/{id}','Api\ProfileController@remove');
Route::get('api/friend/accept/{id}','Api\ProfileController@accept');

// Api Post Requests
Route::post('api/post/create/','Api\PostController@create');

// Profile Requests
Route::get('profile','ProfileController@index');
Route::get('profile/edit','ProfileController@edit');
Route::get('profile/{id}','ProfileController@show');
Route::post('profile/edit','ProfileController@update');

// Domain Requests
Route::get('domain','DomainController@index');
Route::get('domain/{name}','DomainController@show');
Route::get('domain/{name}/edit','DomainController@edit');
Route::post('domain/{name}/edit','DomainController@update');

// Login routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');