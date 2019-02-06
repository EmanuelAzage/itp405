@extends('layout')

@section('title', 'Add a Track')

@section('main')
  <div class="row">
    <div class="col">

      <form action="/tracks/add" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" value="{{old('name')}}">
          <small class="text-danger">{{$errors->first('name')}}</small>
        </div>

        <div class="form-group">
          <label for="album_select">Select Album</label>
          <select name="album" class="form-control" id="album_select">
            @foreach($albums as $album)
              <option value="{{$album->Title}}" {{$album->Title == old('album') ? "selected" : ""}}>
                {{$album->Title}}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="media_type_select">Select Media Type</label>
          <select name="media_type" class="form-control" id="media_type_select">
            @foreach($mediaTypes as $mt)
              <option value="{{$mt->Name}}" {{$mt->Name == old('media_type') ? "selected" : ""}}>
                {{$mt->Name}}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="genres_select">Select Genre</label>
          <select name="genre" class="form-control" value="{{old('genre')}}" id="genres_select">
            @foreach($genres as $genre)
              <option value="{{$genre->Name}}" {{$genre->Name == old('genre') ? "selected" : ""}}>
                {{$genre->Name}}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="composer">Composer</label>
          <input type="text" name="composer" class="form-control" value="{{old('composer')}}">
          <small class="text-danger">{{$errors->first('composer')}}</small>
        </div>

        <div class="form-group">
          <label for="milliseconds">Milliseconds</label>
          <input type="number" name="milliseconds" class="form-control" value="{{old('milliseconds')}}">
          <small class="text-danger">{{$errors->first('milliseconds')}}</small>
        </div>

        <div class="form-group">
          <label for="bytes">Bytes</label>
          <input type="number" name="bytes" class="form-control" value="{{old('bytes')}}">
          <small class="text-danger">{{$errors->first('bytes')}}</small>
        </div>

        <div class="form-group">
          <label for="unit_price">Unit Price</label>
          <input type="number" name="unit_price" class="form-control" value="{{old('unit_price')}}" step=".01">
          <small class="text-danger">{{$errors->first('unit_price')}}</small>
        </div>

        <button type="submit" class="btn btn-primary col-sm-2 col-sm-offset-5">
          Save
        </button>
      </form>

    </div>
  </div>
@endsection
