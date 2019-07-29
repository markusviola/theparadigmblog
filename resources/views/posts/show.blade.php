@extends('layouts/app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-7">
            <br>
            <h2 class="alt-anti-neutral">{{ $post->title }}</h2>
            <h5 class="text-muted mt-2">
                Posted by 
                @if ($post->user->isAdmin == 0)
                    <a class="neutral" href="{{ route('profile', $post->user->url) }}">
                        {{ $post->user->username }}
                    </a>     
                @else
                    {{ $post->user->username }}
                @endif
                on {{ $post->created_at }}</h5>
            <hr>
            <br>
            <div class="text-justify long-text">{{ $post->body }}</div>
            <hr class="mt-3">
            <form id="like-form">
                <input id="likeStatus" type="hidden" name="likeStatus" value="{{ $like_status }}">
                <input id="likeId" type="hidden" name="likeId" value="{{ $like_id }}">
                <input type="hidden" name="blogPostId" value="{{ $post->id }}">
                <div class="d-flex flex-row-reverse mt-3 mr-2">
                    <div>Liked by <strong id="like-count">{{ $post->likes->count() }}</strong></div>
                    <button id="like-btn" class="trans-btn row align-content-center">
                        <i id="like-icon" class="col-auto {{ $like_status == 1 ? 'liked-post' : 'unliked-post'}} fas fa-heart fa-lg mr-1"></i>
                    </button>
                </div>
                @csrf
            </form>
            @include('comments.form')
            @include('comments.postIndex')
        </div>
    </div>
@endsection