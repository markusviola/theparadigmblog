@extends('layouts/app')

@section('content')

    <div class="profile-wrapper">
        <div class="banner-image" id="banner-image">
            @if ($userHeaderImg)
                <img
                    class="header-img"
                    alt="Responsive image"
                    src="{{ asset('storage/'. $userHeaderImg) }}"
                >
            @endif
            @if (Auth::check() && $userId == Auth::user()->id)
                <div class="header-overlay"></div>
                <div class="banner-upload-text">
                    <form
                        action="{{ route('profile.updateHeaderImg', $userId) }}"
                        name="upload-form" id="upload-form"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @method('PATCH')
                        <label for="file-upload"><h2 class="upload-area">Upload a Header Photo</h2></label>
                        <input id="file-upload" type="file" name="blogHeaderImg" onchange="form.submit()"/>
                        @csrf
                    </form>
                </div>
            @endif
        </div>
        <div class="profile-card neutral-round shadow">
            <div class="row justify-content-center">
                <div class="col-11">
                    <form
                        action="{{ route('profile.update', $userId) }}"
                        name="blog-form"
                        id="blog-form"
                        method="POST"
                    >
                        @method('PATCH')
                        <h1>
                            <input
                                class="trans-elem blog-title clean-input alt-anti-neutral"
                                placeholder="{{ Auth::check() && $userId == Auth::user()->id
                                    ? 'Write a clever profile title...'
                                    : ucfirst($userName)."'s Article Posts"
                                }}"
                                type="text"
                                id="blogTitle"
                                name="blogTitle"
                                data-current="{{ $userTitle }}"
                                value="{{ old('title') ?? $userTitle }}"
                            {{ Auth::check() && $userId == Auth::user()->id ? '' : 'disabled'}}>
                        </h1>
                        <hr class="divider">
                        <h5>
                            <textarea
                                class="trans-elem blog-desc clean-input no-scroll text-secondary text-justify"
                                name="blogDesc" placeholder="{{ Auth::check() && $userId == Auth::user()->id
                                    ? 'Appeal yourself to the readers...'
                                    : $userName.' has not written anything here yet...'
                                }}"
                                id="blogDesc"
                                data-current="{{ $userDesc }}"
                                rows="4"
                            {{ Auth::check() && $userId == Auth::user()->id ? '' : 'disabled'}}
                            >{{ old('body') ?? $userDesc }}</textarea>
                        </h5>
                        @csrf
                    </form>
                    <hr class="mb-4 divider">
                    <div class="row">
                        <div class="col-6 text-left">
                            <h4 class="text-secondary">Published Posts</h4>
                        </div>
                    </div>
                    @include('posts.modals.delete')
                    <div id="profile-posts">
                        @if (sizeof($posts) > 0)
                            <br>
                            @foreach ($posts as $post)
                                <h3>
                                    <a class="neutral" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                </h3>
                                <strong class="text-muted long-text">
                                    {{ preg_replace('/[^a-zA-Z0-9.?!\s]/', '', mb_strimwidth($post->body, 0, 190, "...")) }}
                                </strong>
                                <p>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="text-muted">Posted on {{ $post->created_at }} </div>
                                    </div>
                                    <div class="col-md text-muted text-right mr-1">
                                        Updated on {{ $post->updated_at }}
                                    </div>
                                    @if (Auth::check() && $userId == Auth::user()->id)
                                        <a
                                            class="col-md-1 text-right btn-trans px-0"
                                            href="{{ route('posts.edit', $post->id) }}"
                                        >
                                            <i class="edit-post fas fa-pencil-alt fa-lg"></i>
                                        </a>
                                        <button class="col-md-1 text-right btn-trans delete-modal mr-1"
                                            onclick="prepareDeletion(this)"
                                            data-toggle="modal"
                                            data-target="#post-deletion-modal"
                                            data-id="{{ $post->id }}"
                                            data-type="post"
                                            data-on-post="false"
                                        >
                                            <i class="delete-post fas fa-minus-circle fa-lg"></i>
                                        </button>
                                    @endif
                                </div>
                                <hr class="divider">
                            @endforeach
                        @else
                            <div class="no-posts text-muted">
                                <div>
                                    <div class="mb-1 alt-neutral">No articles posted yet.</div>
                                    @if (Auth::check() && $userId == Auth::user()->id)
                                        <div>
                                            Create your first post
                                            <a
                                                class="neutral"
                                                href="{{ route('posts.create') }}"
                                            ><strong>here</strong></a>!
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
