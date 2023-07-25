<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
        {{-- index --}}
        <meta name="theme-color" content="rgba(17, 24, 39, 1)">
        @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
        @else
        <title>{{ config('app.name') }}</title>
        @endif
        @yield('seo')
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @yield('styles')
        <script type="text/javascript">
            function callbackThen(response) {
              // read Promise object
              response.json().then(function(data) {
                console.log(data);
                if(data.success && data.score >= 0.6) {
                   console.log('valid recaptcha');
                } else {
                   document.getElementById('form').addEventListener('submit', function(event) {
                      event.preventDefault();
                      Swal.fire({
                         icon: 'error',
                         title: 'Oops...',
                         text: 'Invalid reCAPTCHA!',
                      });
                   });
                }
              });
            }
         
            function callbackCatch(error){
               console.error('Error:', error)
            }
            </script>
         
            {!! htmlScriptTagJsApi([
               'callback_then' => 'callbackThen',
               'callback_catch' => 'callbackCatch',
            ]) !!}

            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-7BVDQLYP9R"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-7BVDQLYP9R');
            </script>
         </head>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/favicon.png') }}" alt="{{ config('app.name') }}" height="30px" width="auto">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">{{ __('About') }}</a>
                            </li>
                            @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4 @hasSection('bg_color') @yield('bg_color') @else bg-white @endif">
                @yield('content')
            </main>
            <footer class="border border-top bg-white">
                <div class="container py-3">
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>
                                    Copyright &copy; {{ date('Y') }} <a href="{{ config('app.url') }}" class="text-decoration-none fw-bold text-dark">{{ config('app.name') }}</a> by <a href="https://divisidev.com" target="_blank" class="text-decoration-none fw-bold text-dark">Divisidev</a>
                                </strong>
                            </div>
                            <div>
                                <strong>
                                    v. 1.0
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        @stack('scripts')
    </body>
</html>