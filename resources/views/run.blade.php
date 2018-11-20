@extends('layouts.app')

@section('content')
   
    <div class="container">
        <form method="POST" id="game" action="{{ route('log.store') }}">
            @csrf
            <div class="form-group">
                <label for="timer">@lang('messages.timer')</label>
                <p class="form-control" name="timer" id="timer" readonly>30</p>
            </div>
            <div class="form-group">
                <label for="description">@lang('messages.description')</label>
                <input type="text" name="description" class="form-control" id="description" value="{{ __($game->description) }}" readonly>
            </div>
            <div class="form-group">
                <label for="Question">@lang('messages.question')</label>
                <input type="text" name="question" class="form-control" id="question" value="{{ $game->question }}" readonly>
            </div>
            <div class="form-group">
                <label for="userAnswer">@lang('messages.userAnswer')
                @if ($game->name === 'Even' || $game->name === 'Prime')
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="userAnswer" name="userAnswer" value="yes">Yes
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="userAnswer" name="userAnswer" value="no">No
                    </label>
                </div>
                @else
                <input type="text" name="userAnswer" class="form-control" id="userAnswer" placeholder="{{ __('type your answer here...') }}" required>
                @endif
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
            <button type="submit" id="submit" class="btn btn-primary">@lang('messages.submit')</button>
            <button type="button" class="btn btn-primary" onClick="window.location.reload()">@lang('messages.reset')</button>
        </form>
    </div>
    <br>
    @if ($logs ?? null)
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
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
