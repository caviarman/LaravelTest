@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
            </thead>
        <tbody>
            @foreach ($games as $game)
                <tr>
                    <th scope="row">{{ $game->id }}</th>
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->description }}</td>
                    <td><a class="btn btn-secondary" href="{{ route('game.run', ['id' => $game->id]) }}" role="button">Start</a></td>
                </tr>
            @endforeach
</tbody>
</div>
@if (\Auth::user()->id == 1)
    <div class="container">
        <p>
            <a class="btn btn-secondary" href="{{ route('games.new') }}" role="button">Create</a>
        </p>
    </div>
@endif
@endsection
    