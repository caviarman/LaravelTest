@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('games.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>      
    </form>
</div>
@endsection
    