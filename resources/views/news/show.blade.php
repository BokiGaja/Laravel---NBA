@extends('layouts.master')

@section('title', $news->title)

@section('content')
    <div class="card" style="border: lightgrey 1px solid; background: whitesmoke; border-radius: 20px; box-shadow: 8px 8px 5px grey; text-align: center">
        <div class="card-body">
            <h1 class="card-title"> {{ $news->title }}</h1>
            <p class="card-text">{{ $news->content }}</p>
            <p style="font-style: italic;">by</p>
            {{-- We get users name in Post Model--}}
            <h5>{{ $news->user->name}}</h5>
            <h5>{{ $news->user->email }}</h5>
            <a href="{{ route('show-news') }}" class="btn btn-primary">Go back</a>
        </div>
    </div>

@endsection