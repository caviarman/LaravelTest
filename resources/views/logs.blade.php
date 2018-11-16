@extends('layouts.app')

@section('content')
   
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Game</th>
                <th scope="col">Question</th>
                <th scope="col">Your answer</th>
                <th scope="col">Right answer</th>
                <th scope="col">Points</th>
                <th scope="col">Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                <tr>
                <th scope="row">{{ $log->id }}</th>
                <td>{{ $log->name }}</td>
                <td>{{ $log->question }}</td>
                <td>{{ $log->userAnswer }}</td>
                <td>{{ $log->rightAnswer }}</td>
                <td>{{ $log->points }}</td>
                <td>{{ $log->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $logs->links() }}

@endsection
