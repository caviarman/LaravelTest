@extends('layouts.app')

@section('content')
   
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('messages.game')</th>
                <th scope="col">@lang('messages.question')</th>
                <th scope="col">@lang('messages.userAnswer')</th>
                <th scope="col">@lang('messages.rightAnswer')</th>
                <th scope="col">@lang('messages.points')</th>
                <th scope="col">@lang('messages.date')</th>
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
