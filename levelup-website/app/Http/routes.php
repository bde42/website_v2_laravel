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
