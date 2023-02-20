<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Class Management') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

      <!-- Template CSS Files -->
    <link href="{{ asset('template/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="custom-container">
                @if (strpos(Request::path(), 'form-teacher') !== false)

                    <a class="navbar-brand" href="/form-teacher">
                        <img src="{{ asset('images/bkhn_logo.png') }}" alt="logo" class="logo-app">
                        {{ config('app.name', 'Class Management') }}
                    </a>
                @elseif(strpos(Request::path(), 'sub-teacher') !== false)
                    <a class="navbar-brand" href="/sub-teacher">
                        <img src="{{ asset('images/bkhn_logo.png') }}" alt="logo" class="logo-app">
                        {{ config('app.name', 'Class Management') }}
                    </a>
                @else
                    <a class="navbar-brand" href="/student">
                        <img src="{{ asset('images/bkhn_logo.png') }}" alt="logo" class="logo-app">
                        {{ config('app.name', 'Class Management') }}
                    </a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @if (Auth::user())
                @include('layouts.sidebar')
                <div class="main-content">
                    @yield('content')
                </div>
            @else
                <div class="authentication-pages">
                    @yield('content')
                </div>
            @endif
        </main>
    </div>
</body>
</html>
