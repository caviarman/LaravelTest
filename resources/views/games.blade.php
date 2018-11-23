@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">@lang('messages.name')</th>
            <th scope="col">@lang('messages.description')</th>
            <th scope="col">@lang('messages.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($games as $game)
            <tr>
                <th scope="row">{{ $game->id }}</th>
                <td><a href="{{ route('games.logs', ['id' => $game->id]) }}">{{ $game->name }}</a></td>
                <td>{{ __($game->description) }}</td>
                <td><a class="btn btn-secondary" href="{{ route('game.run', ['id' => $game->id]) }}" role="button">@lang('messages.start')</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@if (\Auth::user()->id == 1)
    <div class="container">
        <p>
            <a class="btn btn-secondary" href="{{ route('games.new') }}" role="button">Create</a>
        </p>
    </div>
@endif
@endsection
    