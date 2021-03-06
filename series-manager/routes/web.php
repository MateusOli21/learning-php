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


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', "SeriesController@index");

Route::get('/series/create', "SeriesController@create");

Route::post('/series/create', "SeriesController@store");

Route::post('/series/{id}/delete', "SeriesController@delete");

Route::post('/series/{id}/edit', 'SeriesController@update');

Route::get('/series/{id}/seasons', "SeasonsController@index");

Route::get('/seasons/{id}/info', 'EpisodesController@index');

Route::post('/seasons/{id}/episodes/watch', 'EpisodesController@store');
