@extends('layout')

@section('content')

{!! Form::open(['action' => ['AnimeController@search']]) !!}
    {!! Form::text('s', null) !!}
    {!! Form::submit('検索') !!}
{!! Form::close() !!}

@if(isset($rankedAnimes))
  <h2>おすすめアニメランキング</h2>
    <table class="table">
      <tr>
        <th>ランキング</th>
        <th>アニメ名</th>
      </tr>
      @foreach($rankedAnimes as $anime)
      <tr>
        <td class="va-middle">{{ $anime->rank }}</td>
        <td class="va-middle"><li><a href="{{ action('AnimeController@show', $anime->id) }}">{{ $anime->anime_name }}</a></li></td>
      </tr>
      @endforeach
    </table>
@endif

@if(isset($searchedAnimes))
  <h2>検索結果</h2>
    @foreach($searchedAnimes as $anime)
      <div><li><a href="{{ action('AnimeController@show', $anime->id) }}">{{ $anime->anime_name }}</a></li></div>
    @endforeach
@endif

@endsection
