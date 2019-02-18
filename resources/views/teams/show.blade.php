@extends('layouts.master')

@section('title', $team->name)

@section('content')
    <div class="card" style="border: lightgrey 1px solid; background: whitesmoke; border-radius: 20px; box-shadow: 8px 8px 5px grey; text-align: center">
        <div class="card-body">
            <h1 class="card-title"> {{ $team->name }}</h1>
            <p class="card-text">{{ $team->city }}</p>
            <p class="card-text">{{ $team->email }}</p>
            <p class="card-text">{{ $team->address }}</p>
            <h3>Players</h3>
            @foreach($team->players as $player)
                <a href="{{ route(('show-player'), ['id' => $player->id]) }}" class="btn btn-success">{{ $player->first_name }}</a>
            @endforeach
            <hr>
            <a href="{{ route('show-teams') }}" class="btn btn-primary">Go back</a>
        </div>
    </div>
@endsection