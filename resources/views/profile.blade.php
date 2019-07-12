@extends('layouts/app')

@section('content')
    
    <div class="profile-wrapper">
        <div class="banner-image" id="banner-image">
            @if (Auth::user()->blogHeaderImg)
                <img 
                    class="header-img" 
                    alt="Responsive image" 
                    src="{{ asset('storage/'. Auth::user()->blogHeaderImg) }}"
                >
            @endif
            <div class="header-overlay"></div>
            <div class="banner-upload-text">
                <form action="{{ route('profile.updateHeaderImg', Auth::user()->id) }}" name="upload-form" id="upload-form" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    <label for="file-upload"><h2 class="upload-area">Upload a Header Photo</h2></label>
                    <input id="file-upload" type="file" name="blogHeaderImg" onchange="form.submit()"/>
                    @csrf
                </form>
            </div>
        </div>
        <div class="profile-card shadow">
            <div class="row justify-content-center">
                <div class="col-11">
                    <form action="{{ route('profile.update', Auth::user()->id) }}" name="blog-form" id="blog-form" method="POST">
    
                        @method('PATCH')
                        <h1>
                            <input 
                                class="blog-title clean-input text-secondary" 
                                placeholder="Click to edit blog title..." 
                                type="text"
                                id="blogTitle"
                                name="blogTitle" 
                                data-current="{{ Auth::user()->blogTitle }}"
                                value="{{ old('title') ?? Auth::user()->blogTitle }}"
                            >
                        </h1>
                        <hr>
                        <h5>
                            <textarea 
                                class="blog-desc clean-input no-scroll text-secondary text-justify" 
                                name="blogDesc" placeholder="Write your thoughts here..." 
                                id="blogDesc" 
                                data-current="{{ Auth::user()->blogDesc }}"
                                rows="4"
                            >{{ old('body') ?? Auth::user()->blogDesc }}</textarea>
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
                    <div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to proceed?
                            </div>
                            <div class="modal-footer">
                                <form id="delete-confirmation" method="POST">
                                    @method('DELETE')
                                    <button class="btn btn-link text-danger" type="submit" href="#">
                                        <strong>Confirm</strong> 
                                    </button>
                                    @csrf
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <br>
                        @foreach ($posts as $post)
                            <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                            <strong class="text-muted">{{ mb_strimwidth($post->body, 0, 190, "...")  }}</strong>
                            <p>
                            <div class="row">
                                <div class="col-5">
                                    <div class="text-muted">Posted on {{ $post->created_at }} </div>
                                </div>
                                <div class="col-5 text-muted text-right">
                                    Updated on {{ $post->updated_at }}
                                </div>
                                <a class="col text-right text-info" href="{{ route('posts.edit', $post->id) }}" >
                                    <strong>Edit</strong> 
                                </a>
                                <a class="col text-right text-danger delete-modal" data-toggle="modal" data-target="#delete-confirm" data-id="{{ $post->id }}" href="#">
                                    <strong>Delete</strong> 
                                </a>
                            </div>
                            <hr>
                        @endforeach
                    @else
                        <div class="text-muted" style="width: 100%; height: 80px; display: flex; justify-content:center; align-items: center; text-align: center">
                            <div>
                                <div class="mb-1">No articles posted yet.</div>
                                <div>
                                    Create your first post <a href="{{ route('posts.create') }}"><strong>HERE</strong></a>!
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
@endsection