@extends('layouts/app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <br>
            <h1 class="alt-anti-neutral">{{ $post->title }}</h1>
            <div class="row">
                <h5 class="col-md text-muted mt-3 mb-0">
                    Posted by
                    @if ($post->user->isAdmin == 0)
                        <a class="neutral" href="{{ route('profile', $post->user->url) }}">
                            {{ $post->user->username }}
                        </a>
                    @else
                        {{ $post->user->username }}
                    @endif
                        on {{ $post->created_at }}
                </h5>
                @if (Auth::check() && ($post->user->id == Auth::user()->id || Auth::user()->isAdmin))
                    @include('posts.modals.delete')
                    <a class="mt-3 col-md-1 align-self-center text-right btn-trans px-0"
                        href="{{ route('posts.edit', $post->id) }}">
                        <i class="edit-post fas fa-pencil-alt fa-lg"></i>
                    </a>
                    <button class="mt-3 col-md-1 text-right btn-trans delete-modal mr-1"
                        data-toggle="modal"
                        data-target="#post-deletion-modal"
                        data-id="{{ $post->id }}"
                        data-type="post"
                        data-on-post="true"
                    >
                        <i class="delete-post fas fa-minus-circle fa-lg"></i>
                    </button>
                @endif
            </div>

            <hr class="divider mb-5">
            <div id="post-markdown" class="preserve-breaks text-justify long-text text-dark">
                {{-- markdown gets injected here --}}
            </div>
            <hr class="mt-3 divider">
            <div id="post-likes">
                <form id="like-form">
                    <input id="likeStatus" type="hidden" name="likeStatus" value="{{ $like_status }}">
                    <input id="likeId" type="hidden" name="likeId" value="{{ $like_id }}">
                    <input type="hidden" name="blogPostId" value="{{ $post->id }}">
                    <div class="d-flex flex-row-reverse mt-3 mr-2">
                        <div>Liked by <strong id="like-count">{{ $post->likes->count() }}</strong></div>
                        <button id="like-btn" class="btn-trans row align-content-center">
                            <i id="like-icon" class="col-auto {{ $like_status == 1 ? 'liked-post' : 'unliked-post'}} fas fa-heart fa-lg mr-1"></i>
                        </button>
                    </div>
                    @csrf
                </form>
            </div>
            @include('comments.form')
            @include('comments.postIndex')
        </div>
    </div>
    <script type="application/javascript">
        $(() => {
            var postContent = {!! json_encode($post->body) !!};
            renderMarkDown(postContent, "post-markdown");
        })
    </script>
@endsection
