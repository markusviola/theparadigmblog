@extends('layouts/app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-7">
            <br>
            <h2>{{ $post->title }}</h2>
            <h5 class="text-muted mt-2">Posted by {{ $post->user->username }} on {{ $post->created_at }}</h5>
            <hr>
            <br>
            <div class="text-justify long-text">{{ $post->body }}</div>
            <hr class="mt-3">
            <div class="d-flex flex-row-reverse mt-3 mr-2">
                <div>Liked by <strong>1,067</strong></div>
                <button class="trans-btn row align-content-center"><i class="col-auto like-post fas fa-heart fa-lg mr-1"></i></button>
            </div>
            @include('comments.form')
            @include('comments.postIndex')
        </div>
    </div>
@endsection