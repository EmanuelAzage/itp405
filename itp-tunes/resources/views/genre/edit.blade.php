@extends('layout')

@section('title', 'Edit Genre')

@section('main')
  <div class="row">
    <div class="col">

      <form action="/genres/update" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" value="{{old('name')}}">
          <small class="text-danger">{{$errors->first('name')}}</small>
        </div>
        <button type="submit" class="btn btn-primary col-sm-2 col-sm-offset-5">
          Save
        </button>
      </form>

    </div>
  </div>
@endsection
