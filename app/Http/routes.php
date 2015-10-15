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

//=============================================================================

// User Settings
Route::get('settings','SettingsController@index');
Route::get('settings/profile','SettingsController@profileIndex');
Route::post('settings/profile','SettingsController@profileUpdate');
Route::get('settings/security','SettingsController@index');
Route::get('settings/privacy','SettingsController@index');
Route::get('settings/domain','SettingsController@index');

//=============================================================================

//Domains
Route::get('domain/create', 'DomainController@create');
Route::post('domain/create', 'DomainController@store');

Route::post('d/{did}/invite', 'DomainController@invite');
Route::get('d/{did}/invite/accept', 'DomainController@inviteAccept');
Route::get('d/{did}/invite/{uid}/destroy', 'DomainController@inviteDestroy');

Route::post('d/{did}/ban', 'DomainController@ban');
Route::get('d/{did}/banremove/{uid}', 'DomainController@banRemove');

Route::get('d/{did}/request', 'DomainController@request');
Route::get('d/{did}/request/register', 'DomainController@registerRequest');
Route::post('d/{did}/requestDestroy', 'DomainController@registerDestroy');  //  change to request/destroy
Route::get('d/{did}/request/{uid}/accept', 'DomainController@requestAccept');
Route::get('d/{did}/request/{uid}/cancel', 'DomainController@requestCancel');

Route::get('d/{did}/settings/user/{uid}', 'DomainController@editUser');
Route::post('d/{did}/settings/user/{uid}', 'DomainController@updateUser');
Route::get('d/{did}/settings/users', 'DomainController@users');
Route::get('d/{did}/settings/notifications', 'DomainController@notification');
Route::get('d/{did}/settings', 'DomainController@edit');
Route::post('d/{did}/settings', 'DomainController@update');
Route::post('d/{did}/destroy', 'DomainController@destroy');

Route::get('d/{did}/settings/channels', 'DomainController@channelsIndex');
Route::post('d/{did}/channel/create', 'DomainController@channelCreate');

//=============================================================================

//Channel Routes
Route::get('d/{did}/c/create', 'ChannelController@create');
Route::post('d/{did}/c/create', 'ChannelController@store');
Route::get('d/{did}/c/{cid}/settings', 'ChannelController@edit');
Route::post('d/{did}/c/{cid}/settings', 'ChannelController@update');
Route::get('d/{did}/c/{cid}', 'ChannelController@index');

//=============================================================================

// Notifications
Route::get('n/{nid}','NotificationController@index');
Route::get('n/{nid}/accept','NotificationController@accept');
Route::get('n/{nid}/cancel','NotificationController@cancel');
Route::get('n/{nid}/delete','NotificationController@destroy');
Route::get('dn/{nid}','NotificationController@indexDomain');
Route::get('dn/{nid}/accept','NotificationController@acceptDomain');
Route::get('dn/{nid}/cancel','NotificationController@cancelDomain');
Route::get('dn/{nid}/delete','NotificationController@destroyDomain');

//=============================================================================

// Login routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//=============================================================================


//old
// Image
Route::get('api/image/{id}','Api\ImageController@index');


// Searching
Route::get('search/{query}', 'Api\SearchController@show');


Route::post('fire/{did}', function ($did) {
    // this fires the event
    event(new App\Events\TestEvents($did));
    return "200";
});

Route::get('test/{did}', function () {
    // this checks for the event
    return view('testevents/index');
});