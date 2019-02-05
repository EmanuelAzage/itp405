<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GenresController extends Controller
{
  public function index($genreId = null){
    $genres = DB::table('genres')->get();

    return view('genre.index', [
      'genres' => $genres
    ]);
  }

  public function edit($genreId = null){

    if($genreId){
      $genres = DB::table('genres')
      ->where("genreId", "=", genreId)
      ->first();

      return view("genre.edit", [

      ]);
    }

    redirect("/genres")
  }

  public function update($genreId = null){

    if($genreId){
      $genres = DB::table('genres')
      ->where("genreId", "=", genreId)
      ->first();

      return view("genre.edit", [

      ]);
    }

    redirect("/genres")
  }

}
