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

}
