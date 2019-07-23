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
            {{-- TO FIX: THE ROUTE IS DEPENDENT TO THE COMPACT VARIABLES  --}}
            <form action="{{ $like_status == 0 ? route('likes.store')  : route('likes.destroy', $like_id) }}" id="like-form">
                <input id="likeStatus" type="hidden" name="likeStatus" value="{{ $like_status }}">
                <input type="hidden" name="blogPostId" value="{{ $post->id }}">
                <div class="d-flex flex-row-reverse mt-3 mr-2">
                    <div>Liked by <strong id="like-count">{{ $like_count }}</strong></div>
                    <button id="like-btn" class="trans-btn row align-content-center">
                        <i class="col-auto like-post fas fa-heart fa-lg mr-1"></i>
                    </button>
                </div>
                @csrf
            </form>
            @include('comments.form')
            @include('comments.postIndex')
        </div>
    </div>
@endsection