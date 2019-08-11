@extends('layouts/app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-9">
            <h1 class="alt-neutral">Edit {{ Auth::user()->isAdmin == 1 ? " Announcement" : " Post" }}</h1>
            <hr class="divider">
            {{-- Form method creating a blog post --}}
            <form action="{{ route('posts.update', $post->id) }}" method="POST">

                {{-- Uses a form view for blog post operations --}}
                @method('PATCH')
                @include('posts.form')
                <div class="row justify-content-center pt-3">
                    <button class="btn btn-link alt-neutral" type="submit">Update Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
