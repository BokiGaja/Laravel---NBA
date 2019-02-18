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
Route::get('/', 'TeamsController@index')->name('show-teams');
Route::get('/teams/{team}', 'TeamsController@show')->name('team-info');
Route::get('/players/{id}', 'PlayersController@show')->name('show-player');