<?php

Route::get('/doc', 'DocController@index');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/maintenance', 'MaintenanceController@index');

Route::middleware(['authenticated'])->group(function(){
  Route::get('/profile', 'AdminController@index');
  Route::get('/invoices', "InvoicesController@index");
  Route::get('/settings', "SettingsController@index");
  Route::post('/settings/update', "SettingsController@update");
});

Route::middleware(['maintenance'])->group(function(){
  Route::get('/signup', 'SignUpController@index');
  Route::post('/signup', 'SignUpController@signup');

  Route::get('/genres', "GenresController@index");
  Route::get('/genres/{id}/edit', "GenresController@edit");
  Route::post('/genres/update/{id}', "GenresController@update");

  Route::get('/tracks', "TracksController@index");
  Route::get('/tracks/new', "TracksController@new");
  Route::post('/tracks/add', "TracksController@add");

  Route::get('/', "PlaylistController@index");
  Route::get('/playlist/new', "PlaylistController@create");
  Route::get('/playlist/{id}', "PlaylistController@index");
  Route::post('/playlist', "PlaylistController@store");
});
