@extends('layouts.master')

@section('title', 'Teams')

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert" style="text-align: center">
            {{ session('message') }}
        </div>
    @endif
    @foreach($teams as $team)
        <div class="card" style="width: 18rem; margin-top: 10px; background-color: lightcyan; text-align: center">
            <div class="card-body">
                <h5 class="card-title">{{ $team->name }}</h5>
                <p class="card-text">City: {{ $team->city }}</p>
                <a href="{{ route(('team-info'), ['team' => $team->id]) }}" class="btn btn-primary">See team info</a>
            </div>
        </div>
    @endforeach
@endsection