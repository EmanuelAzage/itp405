@extends('layout')

@section('title', 'Settings')

@section('main')
  <form action="/settings/update" method="post">
    @csrf
    <div class="form-check">
      <input type="checkbox" class="form-check-input" name="maintenance" id="maintenance" {{$isOn ? "checked" : ""}}>
      <label class="form-check-label" for="materialUnchecked">Maintenance Mode</label>
    </div>
    <button type="submit" class="btn btn-primary col-sm-2">
      Save
    </button>
  </form>
@endsection
