<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'The Paradigm Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand text-dark" href="{{ url('/') }}">
                    The Paradigm Articles
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check() && Auth::user()->isAdmin == 1)
                            <div class="nav-link nav-divider"> | </div>
                            <div class="nav-link alt-neutral">Administrator</div>
                        @else
                            <div class="nav-link nav-divider"> | </div>
                            <div class="nav-link alt-neutral">linking creative minds.</div>
                        @endif
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        @guest
                            <div class="nav-link nav-divider"> | </div>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('posts.create') }}">{{ Auth::user()->isAdmin == 1 ? "Announce!" : "Create Post" }}</a>
                            </li>
                            <div class="nav-link nav-divider"> | </div>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->isAdmin == 1)
                                        <a class="neutral-menu dropdown-item text-secondary" href="{{ route('users.index') }}">Manage Users</a>
                                        <a class="neutral-menu dropdown-item text-secondary" href="{{ route('posts.index') }}">Manage Posts</a>
                                        <a class="neutral-menu dropdown-item text-secondary" href="{{ route('comments.index') }}">Manage Comments</a>
                                    @else
                                        <a class="neutral-menu dropdown-item text-secondary" href="{{ route('profile', Auth::user()->url) }}">Profile</a>
                                        <a class="neutral-menu dropdown-item text-secondary" href="{{ route('settings.index') }}">Settings</a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <a class="neutral-menu dropdown-item alt-neutral" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @include('tools.toast')
        @if (Request::path() == 'profile/'.$url || Request::path() == 'posts/create' || ends_with(Request::path(), 'edit'))
            <main class="paradigm container-fluid no-padding">
                @yield('content')
            </main>
        @else
            <main class="paradigm container py-4">
                @yield('content')
            </main>
        @endif
    </div>
<script>
    document.addEventListener("DOMContentLoaded", (event) => {
        if ({{ session()->has("notify") }}) {
            notifyUser('{{ session()->get("notify") }}')
        }
    });
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
