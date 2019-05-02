@extends('layouts/app')

@section('title','{{ Auth::user()->username }}')

@section('content')
    <div class="row justify-content-center">
        <div class="col-9">
            <h1>{{ Auth::user()->blogTitle }}</h1>
            <hr>
            <h4 class="text-muted">{{ Auth::user()->blogDesc }}</h4>

            <br>
            @foreach ($posts as $post)
                <h3>{{ $post->title }}</h3>
                <strong class="text-muted">{{ mb_strimwidth($post->body, 0, 210, "...")  }}</strong>
                <p>
                <div class="row">
                    <div class="col-5">
                        <div class="text-muted">Posted on {{ $post->created_at }} </div>
                    </div>
                    <div class="col-5 text-muted text-right">
                        Updated on {{ $post->updated_at }}
                    </div>
                    <a class="col text-right text-info" href="/posts/{{ $post->id }}/edit" >
                        <strong>Edit</strong> 
                    </a>
                    <a class="col text-right text-danger" href="#">
                        <strong>Delete</strong> 
                    </a>
                </div>
                
                <hr>
            @endforeach
        </div>
    </div>
    
@endsection