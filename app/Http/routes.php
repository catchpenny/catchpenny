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

Route::get('home','HomeController@index');
Route::get('settings','SettingsController@index');

//Domains Related Routes
Route::get('domain/create', 'DomainController@create');
Route::post('domain/create', 'DomainController@store');
Route::get('d/{id}/c/{id}', 'DomainController@index');
Route::get('d/{id}', 'DomainController@index');




/*
 *  Competed Routes
 */

// Login routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


//old
// Image
Route::get('api/image/{id}','Api\ImageController@index');

// Domain Requests
//Route::post('domain/create', 'DomainController@create');
//Route::get('modal/domain/create', function(){ return view('domain.create'); });
//Route::post('api/domain/create', 'Api\DomainController@registerDomain');
//Route::get('domain','DomainController@index');
//Route::get('domain/{domainId}','DomainController@show');
//Route::get('domain/{domainId}/channel/{channelId}','DomainController@show');
//Route::get('domain/{id}/edit','DomainController@edit');
//Route::post('domain/{id}/edit','DomainController@update');


// Searching
Route::get('search/{query}', 'Api\SearchController@show');
