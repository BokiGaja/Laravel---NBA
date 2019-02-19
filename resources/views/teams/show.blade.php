@extends('layouts.master')

@section('title', $team->name)

@section('content')
    {{-- Team info --}}
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
    {{-- Comments --}}
    <h2 class="pb-3 mb-4 font-italic border-bottom" style="margin-top: 30px; text-align: center">Comments</h2>
    <div class="d-flex flex-row" style="margin-top: 20px; text-align: center">
        @foreach($team->comments as $comment)
            <div class="card" style="width: 12rem; text-align: center; background: lightgreen; border-radius: 20%; margin-left: 10px">
                <div class="card-body">
                    <p class="card-text">{{ $comment->content }}</p>
                    <div class="text-muted">{{ $comment->created_at }}</div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- Add comment --}}
    <div class="container" style="padding-top: 20px">
        <form method="POST" action="{{ route(('teams-comment'), ['id' => $team->id]) }}">
            @csrf
            <div class="form-group row">
                <div class="col-8">
                    <textarea id="textarea" name="content" cols="40" rows="5" class="form-control
                            {{ $errors->has('content') ? 'is-invalid' : '' }}
                            {{ $badWord != null ? 'is-invalid' : '' }}" placeholder="Comment" required>{{ old('content') }}</textarea>
                    @include('partials.forbidden-comment', ['field' => 'content', 'badWord' => $badWord])
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('show-teams') }}" class="btn btn-primary">Go back</a>
                </div>
            </div>
        </form>
    </div>
@endsection