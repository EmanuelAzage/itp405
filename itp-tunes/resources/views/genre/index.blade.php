@extends('layout')

@section('title', 'Genres')

@section('main')
  <div class="row">
    <div class="col-3">
      <ul>
        @forelse($genres as $genre)
          <li>
            <a href='/tracks?genre={{$genre->Name}}'>{{$genre->Name}}</a>
          </li>
        @empty
          <li>No Genres</li>
        @endforelse
      </ul>
    </div>
  </div>
@endsection
