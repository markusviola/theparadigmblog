@extends('layouts/app')

@section('content')
    <div class="row justify-content-center mt-4">
        <div id="writing-card" class="col-5">
            <div class="card shadow neutral-round">
                <div class="card-body pb-1">

                    {{-- Form method creating/editing a blog post --}}
                    <form
                        action="{{ $isCreateMode ? route('posts.store') : route('posts.update', $post->id) }}"
                        method="POST"
                    >
                        @if (!$isCreateMode)
                            @method('PATCH')
                        @endif
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <i class="alt-neutral align-self-center fas fa-feather fa-2x ml-2 mr-2"></i>
                                <h1 class="alt-neutral align-self-center m-0">
                                    {{ $isCreateMode ? 'Create' : 'Edit' }}
                                    {{ Auth::user()->isAdmin == 1 ? " Announcement" : " Post" }}
                                </h1>
                            </div>
                            <button class="btn btn-anti-neutral text-white h-50 align-self-center" type="submit">
                                {{ $isCreateMode ? 'Submit' : 'Update' }} Post
                            </button>
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
                    <div class="d-flex">
                        <i class="alt-neutral align-self-center fas fa-poll-h fa-2x ml-2 mr-3"></i>
                        <h1 class="alt-neutral align-self-center m-0">
                            Markdown Output
                        </h1>
                    </div>
                    <hr class="divider">
                    <div class="px-2">
                        <h2 id="output-title" class="alt-anti-neutral pl-1">Make a good title...</h2>
                        <div
                            id="output-markdown"
                            class="preserve-breaks text-justify long-text mt-4 pt-4 pr-3 mx-1
                                 border-top border-bottom w-100 overflow-auto">
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
