@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($games as $game)
        <p>
            <a class="btn btn-secondary" href="{{ route('game.run', ['id' => $game->id]) }}" role="button">{{ $game->name }}</a>
        </p>
    @endforeach
</div>
@endsection
    