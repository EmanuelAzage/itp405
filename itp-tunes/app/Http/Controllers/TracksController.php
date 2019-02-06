<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class TracksController extends Controller
{
  public function index(Request $request){
    $genre_name = $request->query('genre');

    if($genre_name){
      $tracks = DB::table('tracks')
        ->select('tracks.Name as track_name',
         'tracks.UnitPrice as track_price',
          'albums.Title as album_title',
          'artists.Name as artist_name')
        ->join('genres', 'tracks.GenreId','=','genres.GenreId')
        ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
        ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId')
        ->where('genres.Name', '=', $genre_name)
        ->get();

    } else {
      $tracks = [];
    }

    return view('track.index', [
      'tracks' => $tracks
    ]);
  }

  public function new(){

    $genres = DB::table('genres')->get();
    $albums = DB::table('albums')->get();
    $mediaTypes = DB::table('media_types')->get();

    return view('track.new', [
      'genres' => $genres,
      'albums' => $albums,
      'mediaTypes' => $mediaTypes
    ]);

  }

  public function add(Request $request){

    $input = $request->all();

    $validation = Validator::make($input, [
      'name' => 'required',
      'album' => 'required',
      'media_type' => 'required',
      'genre' => 'required',
      'composer' => 'required',
      'milliseconds' => 'required|numeric',
      'bytes' => 'required|numeric',
      'unit_price' => 'required|numeric'
    ]);

    if ($validation->fails()){
      return redirect('/tracks/new')
      ->withInput($input)
      ->withErrors($validation);
    }

    // get Genre, Album, MediaType Id
    $genreId = DB::table('genres')->where('Name', '=', $input['genre'])->get()[0]->GenreId;
    $albumId = DB::table('albums')->where('Title', '=', $input['album'])->get()[0]->AlbumId;
    $mediaTypeId = DB::table('media_types')->where('Name', '=', $input['media_type'])->get()[0]->MediaTypeId;

    // add to database
    DB::table('tracks')->insert(
      ['Name' => $input['name'],
       'AlbumId' => $albumId,
       'MediaTypeId' => $mediaTypeId,
       'GenreId' => $genreId,
       'Composer' => $input['composer'],
       'Milliseconds' => $input['milliseconds'],
       'Bytes' => $input['bytes'],
       'UnitPrice' => $input['unit_price']
      ]
    );

    return redirect('/tracks');

  }


}
