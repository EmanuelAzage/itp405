<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class PlaylistController extends Controller
{

    public function index($playlistId = null){
      $playlists = DB::table('playlists')->get();

      if($playlistId){
        $tracks = DB::TABLE('tracks')
          ->join('playlist_track', 'tracks.TrackId','=','playlist_track.TrackId')
          ->where('PlaylistId', '=', $playlistId)
          ->get();

      } else{
        $tracks = [];
      }

      return view('playlist.index', [
        'playlists' => $playlists,
        'tracks' => $tracks
      ]);
    }

    public function create(){
      return view('playlist.create');
    }

    public function store(Request $request){
      // validate name
      $input = $request->all();
      $validation = Validator::make($input, [
        'name' => 'required|min:5|unique:playlists,Name',

      ]);


      // if validation fails, redirect back to form with odbc_errors
      if ($validation->fails()){
        return redirect('/playlist/new')
          ->withInput()
          ->withErrors($validation);
      }

      // otherwise insert the playlist into database
      DB::table('playlists')->insert([
        "Name" => $request->name
      ]);

      // redirect back to /playlists
      return redirect('/playlist');
    }

    // public function show($playlistId){
    //   // dd($playlistId); // dump and die
    //
    //   if($playlistId){
    //     $tracks = DB::TABLE('tracks')
    //       ->join('playlist_track', 'tracks.TrackId','=','playlist_track.TrackId')
    //       ->where('PlaylistId', '=', $playlistId)
    //       ->get();
    //
    //       // dd($tracks);
    //   } else{
    //     $tracks = [];
    //   }
    //
    //   return view('playlist.index', [
    //     'playlists' => $playlists,
    //     'tracks' => $tracks
    //   ]);
    // }


}
