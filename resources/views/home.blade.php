@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <h2 class="text-secondary">Recent Posts</h2>
            <hr>
            @foreach ($posts as $post)
                <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                <strong class="text-muted">{{ mb_strimwidth($post->body, 0, 190, "...")  }}</strong>
                <p>
                <div class="text-muted">Posted by {{ $post->user->username }} on {{ $post->created_at }}</div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
