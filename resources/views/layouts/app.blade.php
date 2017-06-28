<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'eBriefing Management') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="columns">
            <div class="column is-3">
                <nav class="sidebar">
                    <a href="{{ url('/') }}">
                        <img class="nav-logo" src="/images/e-brief-logo.png" alt="E Briefing App Logo">
                    </a>
                    <br>
                    <a class="" href="{{ route('trips.index') }}">
                        Trips
                    </a>
                    <br>
                    <a class="" href="{{ route('users.index') }}">
                        User Management
                    </a>
                    <br>

                    <hr>

                    @stack('nav-menu')

                    <hr>

                    @if (Auth::guest())
                        <a class="nav-item is-tab" href="{{ url('/login') }}">Login</a>
                        <a class="nav-item is-tab" href="{{ url('/register') }}">Register</a>
                    @else
                        <div>{{ auth()->user()->name }}</div>

                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Logout</a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </nav>
            </div>
            <div class="column">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/api/lang/trans.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
