@extends('layouts/app')

@section('title','{{ Auth::user()->username }}')

@section('content')
    <div class="row justify-content-center">
        <div class="col-9">
            <h1>{{ Auth::user()->blogTitle }}</h1>
            <hr>
            <h4 class="text-muted">{{ Auth::user()->blogDesc }}</h4>
            
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
                <strong class="text-muted">{{ mb_strimwidth($post->body, 0, 210, "...")  }}</strong>
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
        </div>
    </div>
    
@endsection