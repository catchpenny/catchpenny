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
/*
 *
 */

//Domains
Route::get('domain/create', 'DomainController@create');
Route::post('domain/create', 'DomainController@store');

Route::post('d/{did}/invite', 'DomainController@invite');
Route::get('d/{did}/invite/accept', 'DomainController@inviteAccept');
Route::get('d/{did}/invite/cancel', 'DomainController@inviteCancel');
Route::get('d/{did}/invite/{uid}/destroy', 'DomainController@inviteDestroy');

Route::get('d/{did}/request', 'DomainController@request');
Route::get('d/{did}/request/register', 'DomainController@registerRequest');
Route::post('d/{did}/requestDestroy', 'DomainController@registerDestroy');
Route::get('d/{did}/request/{uid}/accept', 'DomainController@requestAccept');
Route::get('d/{did}/request/{uid}/cancel', 'DomainController@requestCancel');

Route::get('d/{did}/settings/users', 'DomainController@editUsers');
Route::post('d/{did}/settings/users', 'DomainController@editUsers');
Route::get('d/{did}/settings/channels', 'DomainController@editChannels');
Route::get('d/{did}/settings/notifications', 'DomainController@notification');
Route::get('d/{did}/settings', 'DomainController@edit');
Route::post('d/{did}/settings', 'DomainController@update');
Route::post('d/{did}/destroy', 'DomainController@destroy');



//Channel Routes
Route::get('d/{did}/c/create', 'ChannelController@create');
Route::post('d/{did}/c/create', 'ChannelController@store');
Route::get('d/{did}/c/{cid}/settings', 'ChannelController@edit');
Route::post('d/{did}/c/{cid}/settings', 'ChannelController@update');
Route::get('d/{did}/c/{cid}', 'ChannelController@index');

// Notifications
Route::get('n/{nid}','NotificationController@index');
Route::get('n/{nid}/accept','NotificationController@accept');
Route::get('n/{nid}/cancel','NotificationController@cancel');
Route::get('n/{nid}/delete','NotificationController@destroy');
Route::get('dn/{nid}','NotificationController@indexDomain');
Route::get('dn/{nid}/accept','NotificationController@acceptDomain');
Route::get('dn/{nid}/cancel','NotificationController@cancelDomain');
Route::get('dn/{nid}/delete','NotificationController@destroyDomain');


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


// Searching
Route::get('search/{query}', 'Api\SearchController@show');
