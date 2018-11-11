@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($games as $game)
        <p>Start <a href="{{ route('game.run', ['id' => $game->id]) }}">{{ $game->name }}</a> game</p>
    @endforeach
</div>
@endsection
    