@extends('layouts.app')

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Total Played</th>
      <th scope="col">Total Points</th>
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
    