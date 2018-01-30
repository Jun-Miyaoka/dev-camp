@extends('layout')

@section('content')
    <table class="table">
      <tr>
        <th>アニメ名</th>
      </tr>
      @foreach($animes as $anime)
      <tr>
         <td class="va-middle"><li><a href="{{ action('AnimeController@show', $anime->id) }}">{{ $anime->anime_name }}</a></li></td>
      </tr>
      @endforeach
    </table>
@endsection
