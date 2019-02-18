@extends('layouts.master')

@section('title', 'Teams')

@section('content')
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