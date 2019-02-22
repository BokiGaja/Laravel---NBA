@extends('layouts.master')

@section('title', $news->title)

@section('content')
    <div class="container">
        <div class="card" style="border: lightgrey 1px solid; background: whitesmoke; border-radius: 20px; box-shadow: 8px 8px 5px grey; text-align: center">
            <div class="card-body">
                <h1 class="card-title"> {{ $news->title }}</h1>
                <p class="card-text">{{ $news->content }}</p>
                <p style="font-style: italic;">by</p>
                {{-- We get users name in Post Model--}}
                <h5>{{ $news->user->name}}</h5>
                <h5>{{ $news->user->email }}</h5>
                <hr>
                <p style="font-style: italic;">Related to teams:</p>
                @foreach($teams as $team)
                    <a href="{{ route(('team-info'), ['id' => $team->id]) }}">{{ $team->name }}</a>
                    <br>
                @endforeach
                <hr>
                <a href="{{ route('show-news') }}" class="btn btn-primary">Go back</a>
            </div>
        </div>
    </div>
@endsection