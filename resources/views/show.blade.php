@extends('layout')

@section('content')
{!! Form::open(['action' => ['AnimeController@score', $animeId]]) !!}
<div>
    {!! Form::label("スコア") !!}
    {!! Form::text("rating", null, ["class" => "form-control"]) !!}
</div>
<div>
    {!! Form::submit("登録", ["class" => "btn"]) !!}
</div>
{!! Form::close() !!}


<table class="table">
  <tr>
    <th>関連アニメ名</th>
  </tr>
  @foreach($relatedAnimeNames as $relatedAnimeNames)
  <tr>
     <td class="va-middle">{{ $relatedAnimeNames }}</td>
  </tr>
  @endforeach
</table>

@endsection
