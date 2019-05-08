@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <h1>Blog Posts</h1>
            <hr>
            @foreach ($posts as $post)
                <h3>{{ $post->title }}</h3>
                <strong class="text-muted">{{ mb_strimwidth($post->body, 0, 210, "...")  }}</strong>
                <p>
                <div class="text-muted">Posted by {{ $post->user->username }}</div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection