<?php

Route::get('/', "InvoicesController@index");

Route::get('/genres', "GenresController@index");
Route::get('/genres/{id}/edit', "GenreController@edit")
Route::post('/genres/update', "GenreController@update")

Route::get('/tracks', "TracksController@index");
Route::get('/tracks/new', "TracksController@new");
Route::post('/tracks/add', "TracksController@add");

Route::get('/playlist', "PlaylistController@index");
Route::get('/playlist/new', "PlaylistController@create");
Route::get('/playlist/{id}', "PlaylistController@index");
Route::post('/playlist', "PlaylistController@store");
