<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/', 'TeamsController@index')->name('show-teams');
    Route::get('/teams/{team}', 'TeamsController@show')->name('team-info');
    Route::get('/players/{id}', 'PlayersController@show')->name('show-player');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware' => ['guest']], function ()
{
    Route::get('/register', 'RegisterController@create')->name('show-register');
    Route::post('/register', 'RegisterController@store')->name('register');
    Route::get('/login', 'LoginController@create')->name('show-login');
    Route::post('/login', 'LoginController@store')->name('login');
});
