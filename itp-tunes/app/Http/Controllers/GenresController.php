<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

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

      $genre = DB::table('genres')
      ->where("GenreId", "=", $genreId)
      ->first()->Name;

      return view("genre.edit", [
        'genre_id' => $genreId,
        'genre_name' => $genre
      ]);

    }

    return redirect("/genres");
  }

  public function update($genreId = null, Request $request){

    if($genreId){

      $input = $request->all();

      $validation = Validator::make($input, [
        'name' => 'required|min:3|unique:genres,Name'
      ]);

      if ($validation->fails()){
        return redirect('/genres/' . $genreId . '/edit')
        ->withInput($input)
        ->withErrors($validation);
      }

      $genre = DB::table('genres')
      ->where("GenreId", "=", $genreId)
      ->update(['Name' => $input['name']]);
    }

    return redirect("/genres");
  }

}
