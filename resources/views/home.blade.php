@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="div" style="width: 19vw; height: 50vh; position: fixed; right: 3rem; top: 10rem; background: lightgray;"></div>
        <div class="col-9">
            <h2 class="text-secondary">Recent Posts</h2>
            <hr class="divider">
            @if (sizeof($posts) > 0)
                @foreach ($posts as $post)
                    @if ($post->user->isAdmin == 1)
                        <div class="admin-text">
                            <i class="fas fa-flag fa-sm mr-2"></i><strong>Announcement</strong>
                        </div>
                    @endif
                    <h3>
                        <a class="anti-neutral" href="{{ route('posts.show', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <div class="text-muted long-text">
                        {{ preg_replace('/[^a-zA-Z0-9.?!\s]/', '', mb_strimwidth($post->body, 0, 190, "...")) }}
                    </div>
                    <p>
                    <div class="row align-content-center">
                        <div class="col-md-6 text-muted">
                            Posted by {{ $post->user->username }} on {{ $post->created_at }}
                        </div>
                        <div class="col-md-6 row px-0 pr-2 text-muted">
                            <div class="col-md-5 offset-md-2 px-0">
                                <div class="d-flex float-right">
                                    <div class="row align-content-center">
                                        <i class="col-auto like-post fas fa-heart fa-lg mr-2"></i>
                                    </div>
                                    <div><strong>{{ $post->likes->count() }}</strong> likes</div>
                                </div>
                            </div>
                            <div class="col-md-5 px-0">
                                <div class="d-flex float-right">
                                    <div class="row align-content-center">
                                        <i class="col-auto comment-post fas fa-comment fa-lg mr-2"></i>
                                    </div>
                                    <div><strong>{{ $post->comments->count() }}</strong> comments</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="divider">
                @endforeach
            @else
                <div class="no-posts text-muted mt-5">
                    <div>
                        <div class="mb-1"><h5 class="alt-neutral">No articles posted yet.</h5></div>
                        <div>
                            Create your first post
                            <a
                                class="neutral"
                                href="{{ route('posts.create') }}"
                            ><strong>here</strong></a>!
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
