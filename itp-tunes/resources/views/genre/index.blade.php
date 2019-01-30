@extends('layout')

@section('title', 'Genres')

@section('main')
  <table class="table">
        @forelse($genres as $genre)
          <tr>
            <td>
              <a href='/tracks?genre={{urlencode($genre->Name)}}'>{{$genre->Name}}</a>
            </td>
          </tr>
        @empty
          <tr><td>No Genres</td></tr>
        @endforelse
      </ul>
  </table>
@endsection
