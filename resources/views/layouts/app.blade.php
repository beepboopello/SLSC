<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Painted World of Aria </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script data-cfasync="false"
        src="https://gambolthemes.net/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript" src="https://gambolthemes.net/workwise-new/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://gambolthemes.net/workwise-new/js/popper.js"></script>
    <script type="text/javascript" src="https://gambolthemes.net/workwise-new/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://gambolthemes.net/workwise-new/lib/slick/slick.min.js"></script>
    {{-- <script type="text/javascript" src="https://gambolthemes.net/workwise-new/js/script.js"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dc.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <div class="wrapper">
        @php
            $places = App\Models\Place::all();
        @endphp
        <ul class="guilds-container">
            @foreach ($places as $place)
                <a href="/warp/{{ $place->endpoint }}">
                    <li class="squircle purple-boi" style="background-image: url('{{ asset($place->icon) }}')">
                        <div class="popper-boi">
                            <h4 class="popper-text">{{ $place->name }}</h4>
                        </div>
                    </li>
                </a>
            @endforeach
            {{-- <li class="divider"></li> --}}
            @if (Auth::user() != null)
                <a href="/shop">
                    <li class="squircle purple-boi" style="background-image: url('{{ asset('/assets/images/iron_helm.png') }}')">
                        <div class="popper-boi">
                            <h4 class="popper-text">Cừa hàng giáp</h4>
                        </div>
                    </li>
                </a>
                {{-- @if (Auth::user()->id == 1)
                    <li class="squircle green-boi">
                        <svg class="circleIcon-LvPL6c" aria-hidden="false" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M20 11.1111H12.8889V4H11.1111V11.1111H4V12.8889H11.1111V20H12.8889V12.8889H20V11.1111Z">
                            </path>
                        </svg>
                        <div class="popper-boi">
                            <h4 class="popper-text">Tạo một cộng đồng</h4>
                        </div>
                    </li>
                @endif --}}
            @endif
        </ul>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <div>
                        <img style="max-height: 50px" src="{{ asset('/assets/images/bonfire.gif') }}">
                    </div>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Painted World of Aria
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <div class="search-bar st2">
                                <li>
                                    <form method="POST" action="/search" style="margin-left: 50px">
                                        <input type="text" name="search" placeholder="Search..."
                                            style="border: 2px solid #686868; border-radius: 4px;">
                                        <button type="submit"
                                            style="background-color: #e9ecef;border: 2px solid #686868;"><i
                                                class="fa fa-search" style="color: black"></i></button>
                                    </form>
                                </li>
                            </div>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/user/@php echo Auth::user()->id @endphp">{{ __('Profile') }}</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            {{-- <main class="py-4" > --}}
            @yield('content')
            {{-- </main> --}}
        </div>
    </div>
</body>

</html>
