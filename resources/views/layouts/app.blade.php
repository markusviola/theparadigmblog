<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The Paradigm Articles</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link
        rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"
    >
</head>
<body>
    <div id="app">
        {{-- Navigation Bar --}}
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel shadow-sm sticky-top">
            <div class="container">

                {{-- App Name --}}
                <a class="navbar-brand text-dark" href="{{ url('/') }}">
                    The Paradigm Articles
                </a>

                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}"
                ><span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check() && Auth::user()->isAdmin == 1)
                            <div class="d-flex">
                                <div class="nav-link nav-divider"> | </div>
                                <div class="nav-link alt-neutral ml-1">Administrator</div>
                            </div>
                        @else
                            <div class="d-flex">
                                <div class="nav-link nav-divider"> | </div>
                                <div class="nav-link alt-neutral ml-1">linking creative minds.</div>
                            </div>
                        @endif
                    </ul>

                    {{-- Navigation Menu Links --}}
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        @guest
                            <div class="d-flex">
                                <div class="nav-link nav-divider"> | </div>
                                <li class="nav-item ml-1">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                                </li>
                            </div>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="{{ route('posts.create') }}"
                                >{{ Auth::user()->isAdmin == 1 ? "Announce!" : "Create Post" }}</a>
                            </li>

                            <div class="d-flex">
                                <div class="nav-link nav-divider"> | </div>

                                {{-- Dropdown Menu --}}
                                <li class="nav-item dropdown ml-1">

                                    <a
                                        id="navbarDropdown"
                                        class="nav-link dropdown-toggle"
                                        href="#"
                                        role="button"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        v-pre
                                    >{{ Auth::user()->username }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        @if(Auth::user()->isAdmin == 1)
                                            <h6 class="dropdown-header alt-neutral"><strong>Manage</strong></h6>
                                            <a class="neutral-menu dropdown-item text-secondary"
                                                href="{{ route('users.index') }}">Users</a>
                                            <a class="neutral-menu dropdown-item text-secondary"
                                                href="{{ route('posts.index') }}">Article Posts</a>
                                            <a class="neutral-menu dropdown-item text-secondary"
                                                href="{{ route('comments.index') }}">Comments</a>
                                            <div class="dropdown-divider"></div>
                                        @else
                                            <a class="neutral-menu dropdown-item text-secondary"
                                                href="{{ route('profile', Auth::user()->url) }}">Profile</a>
                                        @endif

                                        <a class="neutral-menu dropdown-item text-secondary"
                                            href="{{ route('settings.index') }}">Settings</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="neutral-menu dropdown-item alt-neutral"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                        </form>

                                    </div>
                                </li>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        {{-- Page Content Injection --}}

        @include('tools.toast')
        @if (Request::path() == 'profile/'.$url || Request::path() == 'posts/create' || ends_with(Request::path(), 'edit'))
            <main class="paradigm container-fluid px-0">
                @yield('content')
            </main>
        @else
            <main class="paradigm container py-4">
                @yield('content')
            </main>
        @endif
    </div>
<script type="application/javascript">
    document.addEventListener("DOMContentLoaded", (event) => {
        let checkSession = '{!! session()->has("notify") !!}';
        // console.log(checkSession);
        if (checkSession) {
            notifyUser('{{ session()->get("notify") }}');
        }
    });
</script>
</body>
</html>
