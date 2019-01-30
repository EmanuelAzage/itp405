<?php

Route::get('/', "InvoicesController@index");

Route::get('/genres', "GenresController@index");
Route::get('/tracks', "TracksController@index");

Route::get('/playlist', "PlaylistController@index");
Route::get('/playlist/new', "PlaylistController@create");
Route::get('/playlist/{id}', "PlaylistController@index");
Route::post('/playlist', "PlaylistController@store");
