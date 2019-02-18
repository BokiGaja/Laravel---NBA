@extends('layouts.master')

@section('title', $player->first_name)

@section('content')
    <div class="card" style="border: lightgrey 1px solid; background: whitesmoke; border-radius: 20px; box-shadow: 8px 8px 5px grey; text-align: center">
        <div class="card-body">
            <h1 class="card-title"> {{ $player->first_name }} {{ $player->last_name }}</h1>
            <p class="card-text">Email: {{ $player->email }}</p>
            <p class="card-text">Team: {{ $player->team->name }}</p>
            <a href="{{ route(('team-info'), ['id' => $player->team->id]) }}" class="btn btn-primary">Go back</a>
        </div>
    </div>
@endsection