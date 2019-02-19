@extends('layouts.master')

@section('title', 'News')

@section('content')
    <h2 class="pb-3 mb-4 font-italic border-bottom" style="margin-top: 30px; text-align: center">Comments</h2>
    <div class="d-flex flex-row" style="margin-top: 20px; text-align: center">
        @foreach($news as $info)
            <div class="card" style="width: 12rem; text-align: center; background: lightgreen; border-radius: 20%; margin-left: 10px">
                <div class="card-body">
                    <a href="/news/{{ $info->id }}"><h3>{{ $info->title }}</a></h3>
                    <p class="card-text">{{ $info->content }}</p>
                    <div class="text-muted">by</div>
                    <p class="text-muted">{{ auth()->user()->find($info->user_id)->name }}</p>
                    <p class="text-muted">{{ auth()->user()->find($info->user_id)->email }}</p>
                    <div class="text-muted">{{ $info->created_at }}</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection