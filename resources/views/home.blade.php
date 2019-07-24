@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <h2 class="text-secondary">Recent Posts</h2>
            <hr>
            @foreach ($posts as $post)
                <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                <strong class="text-muted long-text">{{ mb_strimwidth($post->body, 0, 190, "...")  }}</strong>
                <p>
                <div class="row align-content-center">
                    <div class="col-6 text-muted">Posted by {{ $post->user->username }} on {{ $post->created_at }}</div>
                    <div class="col-6">
                        <div class="d-flex float-right pr-3">
                            <div class="row align-content-center">
                                <i id="like-icon" class="col-auto like-post fas fa-heart fa-lg mr-2"></i>
                            </div>
                            <div><strong id="like-count">{{ $post->likes->count() }}</strong></div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
