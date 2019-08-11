@extends('layouts/app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-10">
            <h1 class="alt-neutral">Create {{ Auth::user()->isAdmin == 1 ? "an Announcement" : "a Post" }}</h1>
            <hr class="divider">
            {{-- Form method creating a blog post --}}
            <form action="{{ route('posts.store') }}" method="POST">

                {{-- Uses a form view for blog post operations --}}
                @include('posts.form')
                <div class="row justify-content-center pt-3">
                    <button class="btn btn-anti-neutral text-white" type="submit">Submit Post</button>
                </div>
            </form>
        </div>
    </div>

@endsection
