@extends('layouts/app')

@section('title','{{ Auth::user()->username }}')

@section('content')
    <div class="row justify-content-center">
        <div class="col-7">
            <br>
            <h2>{{ $post->title }}</h2>
            <h5 class="text-muted">Posted by {{ $post->user->username }} on {{ $post->created_at }}</h5>
            <hr>
            <br>
            <h6 class="text-justify">{{ $post->body }}</h6>

            @include('comments.form')
            @include('comments.index')
        </div>
    </div>
@endsection