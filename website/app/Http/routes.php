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

Route::get('/', ['as' => 'home', 'uses' => 'BaseController@home']);
Route::get('/home', function () {
    return redirect('/');
});

// Test route
Route::get('/test/{slug}', ['as' => 'test', 'uses' => 'BaseController@test']);
//Route::get('/test/{slug}', ['as' => 'test', 'uses' => 'BaseController@test', 'middleware' => 'auth.club:editor']);

// Authentication routes...
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@login']);
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
Route::get('auth/me', ['as' => 'user-me', 'uses' => 'Auth\AuthController@me']);
//Route::post('auth/getlogin', 'Auth\AuthController@postLogin');

// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');

// Clubs routes
Route::get('/clubs', ['as' => 'clubs', 'uses' => 'ClubController@index']);
Route::get('/club/{slug}', ['as' => 'club-show', 'uses' => 'ClubController@show']);

Route::get('/club/{slug}/roles', ['as' => 'club-roles', 'uses' => 'ClubRoleController@show']);
Route::get('/club/{slug}/role/create', ['as' => 'club-role-create', 'uses' => 'ClubRoleController@create']);
Route::post('/club/{slug}/role/create', ['as' => 'club-role-store', 'uses' => 'ClubRoleController@store']);
Route::get('/club/{slug}/role/{role_id}/delete', ['as' => 'club-role-destroy', 'uses' => 'ClubRoleController@destroy']);

// Admin routes
Route::group(['prefix' => 'dashboard', 'as' => 'admin::'], function()
{
    // Club administration routes
    // A remplacer par une ressource : Route::resource('clubs', 'ClubsController');
    Route::get('club/create', ['as' => 'club-create', 'uses' => 'ClubController@create']);
    Route::post('club/create', ['as' => 'club-store', 'uses' => 'ClubController@store']);
    Route::get('clubs', ['as' => 'clubs', 'uses' => 'ClubController@admin']);
    Route::get('club/destroy/{id}', ['as' => 'club-destroy', 'uses' => 'ClubController@destroy']);
    Route::get('club/update/{id}', ['as' => 'club-edit', 'uses' => 'ClubController@edit']);
    Route::post('club/update', ['as' => 'club-update', 'uses' => 'ClubController@update']);
    
    // Settings routes
    Route::get('settings', ['as' => 'settings', 'uses' => 'SettingsController@edit']);
    Route::post('settings', ['as' => 'settings-update', 'uses' => 'SettingsController@update']);
});
