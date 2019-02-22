@extends('layouts.master')

@section('title', $news->title)

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert" style="text-align: center">
                {{ session('message') }}
            </div>
        @endif
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
                <div class="d-flex flex-row justify-content-between">
                <a href="{{ route(('edit-news'), ['news' => $news->id]) }}" class="btn btn-danger">Edit</a>
                <a href="{{ route('show-news') }}" class="btn btn-primary">Go back</a>
                    <form method="POST" action="{{ route(('delete-news'), ['id' => $news->id]) }}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-dark" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection