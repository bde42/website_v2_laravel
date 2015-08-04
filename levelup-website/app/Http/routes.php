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
Route::get('/home', ['as' => 'home', 'uses' => 'BaseController@home']);

// Test route
Route::get('/test', ['as' => 'test', 'uses' => 'BaseController@test']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/clubs', ['as' => 'clubs', 'uses' => 'ClubController@index']);
Route::get('/club/{slug}', ['as' => 'club-show', 'uses' => 'ClubController@show']);

Route::group(['prefix' => 'dashboard', 'as' => 'admin::'], function()
{
    Route::get('club/create', ['as' => 'club-create', 'uses' => 'ClubController@create']);
    Route::post('club/create', ['as' => 'club-store', 'uses' => 'ClubController@store']);
    Route::get('clubs', ['as' => 'clubs', 'uses' => 'ClubController@admin']);
    Route::get('club/destroy/{id}', ['as' => 'club-destroy', 'uses' => 'ClubController@destroy']);
    Route::get('club/update/{id}', ['as' => 'club-edit', 'uses' => 'ClubController@edit']);
    Route::post('club/update', ['as' => 'club-update', 'uses' => 'ClubController@update']);
});
