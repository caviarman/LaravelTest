@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="container">
    <p>
        <a class="btn btn-secondary" href="/home/ru" role="button">Русская версия</a>
        <a class="btn btn-secondary" href="/home/en" role="button">Aнглийская версия</a>
    </p>
</div> -->
@endsection
