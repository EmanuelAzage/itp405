<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
}
