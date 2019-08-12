@extends('layouts/app')

@section('content')
    <div class="row justify-content-center mt-4">
        <div id="writing-card" class="col-5">
            <div class="card shadow neutral-round">
                <div class="card-body pb-1">

                    {{-- Form method creating a blog post --}}
                    <form action="{{ route('posts.store') }}" method="POST">
                        <div class="d-flex justify-content-between">

                            <h1 class="alt-neutral align-self-center m-0">Create {{ Auth::user()->isAdmin == 1 ? "an Announcement" : "a Post" }}</h1>
                            <button class="btn btn-anti-neutral text-white h-50 align-self-center" type="submit">Submit Post</button>
                        </div>
                        <hr class="divider">

                        {{-- Uses a form view for blog post operations --}}
                        @include('posts.form')
                    </form>
                </div>
            </div>
        </div>
        <div id="output-card" class="col-5">
            <div class="card shadow neutral-round h-100">
                <div class="card-body">
                    <h1 class="alt-neutral align-self-center m-0">Output</h1>
                    <hr class="divider">
                    <div class="px-2">
                        <h2 id="output-title" class="alt-anti-neutral pl-1">Your title goes here!</h2>
                        <div
                            id="output-markdown"
                            class="preserve-breaks text-justify long-text mt-4 pt-4 pr-3 mx-1 border-top border-bottom w-100 overflow-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(() => {
            adjustCardHeight();
            checkChanges();
        })
    </script>
@endsection
