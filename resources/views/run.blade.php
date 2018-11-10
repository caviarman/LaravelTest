@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('log', ['id' => $id]) }}">
            @csrf
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" id="description" value="{{ $description }}" readonly>
            </div>
            <div class="form-group">
                <label for="Question">Question</label>
                <input type="text" name="question" class="form-control" id="Question" value="{{ $question }}" readonly>
            </div>
            <div class="form-group">
                <label for="userAnswer">Your answer</label>
                <input type="text" name="userAnswer" class="form-control" id="userAnswer" placeholder="type your answer here...">
            </div>
            <div class="form-group">
                <input type="hidden" name="rightAnswer" class="form-control" id="rightAnswer" value="{{ $rightAnswer }}">
                <input type="hidden" name="id" class="form-control" id="id" value="{{ $id }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @if
    
    @endif
@endsection
