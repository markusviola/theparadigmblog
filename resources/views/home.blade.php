@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <h2 class="text-secondary">Recent Posts</h2>
            <hr>
            @foreach ($posts as $post)
                @if ($post->user->isAdmin == 1)
                    <div class="admin-text"><i class="fas fa-flag fa-sm mr-2"></i><strong>Announcement</strong></div>    
                @endif
                <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                <div class="text-muted long-text">{{ mb_strimwidth($post->body, 0, 190, "...")  }}</div>
                <p>
                <div class="row align-content-center">
                    <div class="col-md-6 text-muted">Posted by {{ $post->user->username }} on {{ $post->created_at }}</div>
                    <div class="col-md-6 row no-padding pr-2 text-muted">
                        <div class="col-md-5 offset-md-2 no-padding">
                            <div class="d-flex float-right">
                                <div class="row align-content-center">
                                    <i class="col-auto like-post fas fa-heart fa-lg mr-2"></i>
                                </div>
                                <div><strong>{{ $post->likes->count() }}</strong> likes</div>
                            </div>
                        </div>
                        <div class="col-md-5 no-padding">
                            <div class="d-flex float-right">
                                <div class="row align-content-center">
                                    <i class="col-auto comment-post fas fa-comment fa-lg mr-2"></i>
                                </div>
                                <div><strong>{{ $post->comments->count() }}</strong> comments</div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
