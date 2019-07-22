@extends('layouts/app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-7">
            <br>
            <h2>{{ $post->title }}</h2>
            <h5 class="text-muted">Posted by {{ $post->user->username }} on {{ $post->created_at }}</h5>
            <hr>
            <br>
            <div class="text-justify long-text">{{ $post->body }}</div>

            @include('comments.form')
            @include('comments.postIndex')
        </div>
    </div>
@endsection