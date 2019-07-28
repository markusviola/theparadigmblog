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
                    <form action="{{ route('profile.updateHeaderImg', $userId) }}" name="upload-form" id="upload-form" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        <label for="file-upload"><h2 class="upload-area">Upload a Header Photo</h2></label>
                        <input id="file-upload" type="file" name="blogHeaderImg" onchange="form.submit()"/>
                        @csrf
                    </form>
                </div>
            @endif
        </div>
        <div class="profile-card shadow">
            <div class="row justify-content-center">
                <div class="col-11">
                    <form action="{{ route('profile.update', $userId) }}" name="blog-form" id="blog-form" method="POST">
                        @method('PATCH')
                        <h1>
                            <input 
                                class="trans-elem blog-title clean-input text-secondary" 
                                placeholder="{{ Auth::check() && $userId == Auth::user()->id 
                                    ? 'Write a clever article title...' 
                                    : ucfirst($userName)."'s Article Posts" 
                                }}" 
                                type="text"
                                id="blogTitle"
                                name="blogTitle" 
                                data-current="{{ $userTitle }}"
                                value="{{ old('title') ?? $userTitle }}"
                            {{ Auth::check() && $userId == Auth::user()->id ? '' : 'disabled'}}>
                        </h1>
                        <hr>
                        <h5>
                            <textarea 
                                class="trans-elem blog-desc clean-input no-scroll text-secondary text-justify" 
                                name="blogDesc" placeholder="{{ Auth::check() && $userId == Auth::user()->id 
                                    ? 'Write your thoughts here...' 
                                    : $userName.' has not written anything here yet...'
                                }}"  
                                id="blogDesc" 
                                data-current="{{ $userDesc }}"
                                rows="4"
                            {{ Auth::check() && $userId == Auth::user()->id ? '' : 'disabled'}}>{{ old('body') ?? $userDesc }}</textarea>
                        </h5>
                        @csrf
                    </form>
                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-6 text-left">
                            <h4 class="text-secondary">Published Posts</h4>
                        </div>
                    </div>
                    @if (sizeof($posts) > 0)
                        @include('posts.modals.delete')
                        <br>
                        @foreach ($posts as $post)
                            <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                            <strong class="text-muted long-text">{{ mb_strimwidth($post->body, 0, 190, "...")  }}</strong>
                            <p>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="text-muted">Posted on {{ $post->created_at }} </div>
                                </div>
                                <div class="col-md text-muted text-right mr-1">
                                    Updated on {{ $post->updated_at }}
                                </div>
                                @if (Auth::check() && $userId == Auth::user()->id)
                                    <a class="col-md-1 text-right trans-btn no-padding" href="{{ route('posts.edit', $post->id) }}">
                                        <i class="edit-post fas fa-pencil-alt fa-lg"></i>
                                    </a>
                                    <button class="col-md-1 text-right trans-btn delete-modal mr-1" 
                                        data-toggle="modal" 
                                        data-target="#delete-confirm" 
                                        data-id="{{ $post->id }}" 
                                        data-type="post" 
                                        data-on-post="false"
                                    >
                                        <i class="delete-post fas fa-minus-circle fa-lg"></i>
                                    </button>
                                @endif
                            </div>
                            <hr>
                        @endforeach
                    @else
                        <div class="no-posts text-muted">
                            <div>
                                <div class="mb-1">No articles posted yet.</div>
                                @if (Auth::check() && $userId == Auth::user()->id)
                                    <div>
                                        Create your first post <a href="{{ route('posts.create') }}"><strong>HERE</strong></a>!
                                    </div>     
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection