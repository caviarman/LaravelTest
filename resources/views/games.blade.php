@extends('layouts.app')

@section('content')
<div class="container">
@foreach ($games as $game)
    <p><a href="{{ route('game.run', ['id' => $game->id]) }}">{{ $game->name }}</a></p>
@endforeach
</div>
@endsection
    