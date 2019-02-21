@extends('layouts.master')

@section('title', 'Create news')

@section('content')
    <div class="container">
        <h1 class="pb-3 mb-4 font-italic border-bottom" style="text-align: center">
            Create news
        </h1>
        <form method="POST" action="{{ route('store-news') }}">
            @csrf
            <div class="form-group row">
                <div class="col-8">
                    <input type="text" id="text" name="title" class="form-control
                    {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Title" value="{{ old('title') }}" required>
                    @include('partials.invalid-feedback', ['field' => 'title'])
                </div>
            </div>
            <div class="form-group row">
                <div class="col-8">
                    <textarea id="textarea" name="content" cols="40" rows="5" class="form-control
                        {{ $errors->has('content') ? 'is-invalid' : '' }}" placeholder="Content" required>{{ old('content') }}</textarea>
                    @include('partials.invalid-feedback', ['field' => 'content'])
                </div>
            </div>
            @foreach($teams as $team)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="team[]" id="inlineCheckbox1" value="{{ $team->id }}">
                    <label class="form-check-label" for="inlineCheckbox1">{{ $team->name }}</label>
                </div>
            @endforeach
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <a href="{{ route('show-teams') }}" class="btn btn-primary">Go to teams</a>
                </div>
            </div>
        </form>
    </div>
@endsection