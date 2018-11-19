@extends('layouts.app')

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">@lang('messages.userName')</th>
      <th scope="col">Email</th>
      <th scope="col">@lang('messages.totalPlayed')</th>
      <th scope="col">@lang('messages.totalPoints')</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->count }}</td>
      <td>{{ $user->points }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
    