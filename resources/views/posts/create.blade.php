@extends('layouts/app')

@section('title','Create Post')

@section('content')
    <div class="row justify-content-center">
        <div class="col-9">
            <h1>Create Post</h1>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-9">
            <hr>
            {{-- Form method creating a blog post --}}
            <form action="{{ route('posts.store') }}" method="POST">
                
                {{-- Uses a form view for blog post operations --}}
                @include('posts.form')
                <div class="row justify-content-center pt-3">
                    <button class="btn btn-primary" type="submit">Submit Post</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection