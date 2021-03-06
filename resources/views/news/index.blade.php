@extends('layouts.master')

@section('title', 'News')


@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert" style="text-align: center">
                {{ session('message') }}
            </div>
        @endif
        <div class="d-flex flex-column justify-content-center">
            <div class="container">
            <h2 class="pb-3 mb-4 font-italic border-bottom" style="margin-top: 30px; text-align: center">News</h2>
            <div class="row d-flex justify-content-center" style="margin-top: 20px; text-align: center">
                @foreach($news as $info)
                    <div class="card col-sm-5" style="width: 12rem; text-align: center; background: lightgreen; border-radius: 20%; margin-left: 10px; margin-top: 10px">
                        <div class="card-body">
                            <a href="/news/{{ $info->id }}"><h3>{{ $info->title }}</a></h3>
                            <p class="card-text">{{ str_limit($info->content, $limit = 30, $end = '...') }}</p>
                            <div class="text-muted">by</div>
                            <p class="text-muted">{{ $info->user->name }}</p>
                            <p class="text-muted">{{ $info->user->email }}</p>
                            <div class="text-muted">{{ $info->created_at }}</div>
                        </div>
                    </div>
                @endforeach
            <div style="margin-top: 10px">{{ $news->links() }}</div>
        </div>
    </div>
@endsection