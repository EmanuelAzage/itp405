@extends('layout')

@section('title', 'Tracks')

@section('main')
<a href="tracks/new" class="btn btn-info" role="button">Add Track</a>
  <table class="table">
    <tr>
      <th>Track Name</th>
      <th>Artist Name</th>
      <th>Album Title</th>
      <th>Price</th>
    </tr>
    @forelse($tracks as $track)
      <tr>
        <td>{{$track->track_name}}</td>
        <td>{{$track->artist_name}}</td>
        <td>{{$track->album_title}}</td>
        <td>{{$track->track_price}}</td>
      </tr>
    @empty
      <tr><td>No Tracks</td></tr>
    @endforelse
  </table>

@endsection
