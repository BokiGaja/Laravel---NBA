@extends('layouts.master')

@section('title', 'Edit news')

@section('content')
    <div class="container">
        <h1 class="pb-3 mb-4 font-italic border-bottom" style="text-align: center">
            Edit news
        </h1>
        <form method="POST" action="{{ route(('update-news'), ['id' => $news->id]) }}">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <div class="col-8">
                    <input type="text" name="title" id="text" class="form-control
                    {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Title" value="{{ $news->title }}">
                    @include('partials.invalid-feedback', ['field' => 'title'])
                </div>
            </div>
            <div class="form-group row">
                <div class="col-8">
                    <textarea name="content" id="textarea" cols="40" rows="5" class="form-control
                    {{ $errors->has('content') ? 'is-invalid' : '' }}" placeholder="Content">{{ $news->content }}</textarea>
                    @include('partials.invalid-feedback', ['field' => 'content'])
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button class="btn btn-primary" type="submit">Edit</button>
                    <a href="{{ route('show-teams') }}" class="btn btn-primary">Go back</a>
                </div>
            </div>
        </form>
    </div>
@endsection