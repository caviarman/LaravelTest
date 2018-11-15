@extends('layouts.app')

@section('content')
   
    <div class="container">
        <form method="POST" id="game" action="{{ route('log.store') }}">
            @csrf
            <div class="form-group">
                <label for="timer">Timer</label>
                <p class="form-control" name="timer" id="timer" readonly>30</p>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" id="description" value="{{ $game->description }}" readonly>
            </div>
            <div class="form-group">
                <label for="Question">Question</label>
                <input type="text" name="question" class="form-control" id="question" value="{{ $game->question }}" readonly>
            </div>
            <div class="form-group">
                <label for="userAnswer">Your answer</label>
                <input type="text" name="userAnswer" class="form-control" id="userAnswer" placeholder="type your answer here..." required>
            </div>
            <div class="form-group">
                <input type="hidden" name="rightAnswer" class="form-control" id="rightAnswer" value="{{ $game->rightAnswer }}">
                <input type="hidden" name="gameId" class="form-control" id="gameid" value="{{ $game->id }}">
                <input type="hidden" name="userId" class="form-control" id="userid" value="{{ \Auth::user()->id }}">
                <input type="hidden" name="points" class="form-control" id="points">
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
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-primary" onClick="window.location.reload()">Reset</button>
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
                <th scope="col">Points</th>
                <th scope="col">Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                <tr>
                <th scope="row">{{ $log->id }}</th>
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
    @endif
    <script type="text/javascript">
	function timer() {
        const obj = document.getElementById('timer');
        document.getElementById("points").value = obj.innerHTML;
        obj.innerHTML--;
        if (obj.innerHTML < 11) {
            obj.style.color = "red";
            //obj.style.fontSize = "19px"; 
        }
        if (obj.innerHTML == 0) {
            document.getElementById("userAnswer").readOnly = true;
            document.getElementById("submit").style.visibility = "hidden";
            alert("Time is up! Try again");
        }
        else 
        {
            setTimeout(timer, 1000);
        }
    }
	setTimeout(timer, 1000);
	</script>
@endsection
