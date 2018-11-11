@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('log.store') }}">
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
                <input type="hidden" name="gameId" class="form-control" id="gameid" value="{{ $gameId }}">
                <input type="hidden" name="userId" class="form-control" id="userid" value="{{ \Auth::user()->id }}">
            </div>
            <div class="form-group">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session()->get('success') }}</strong>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                    </div>
                
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <br>
    @if ($logs ?? null)
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Question</th>
      <th scope="col">Your answer</th>
      <th scope="col">Right answer</th>
      <th scope="col">Created</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($logs as $log)
    <tr>
      <th scope="row">{{ $log['id'] }}</th>
      <td>{{ $log['question'] }}</td>
      <td>{{ $log['userAnswer'] }}</td>
      <td>{{ $log['rightAnswer'] }}</td>
      <td>{{ $log['created_at'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
    @endif
@endsection
