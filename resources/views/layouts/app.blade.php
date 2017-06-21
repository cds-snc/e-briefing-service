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
        <!-- navigation -->
        <nav class="nav has-shadow">
            <div class="container">
                <div class="nav-left">
                    <a class="nav-item" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <a class="nav-item is-tab" href="{{ route('trips.index') }}">
                        Trips
                    </a>
                    <a class="nav-item is-tab" href="{{ route('users.index') }}">
                        Users
                    </a>
                </div>
                <span class="nav-toggle">
                  <span></span>
                  <span></span>
                  <span></span>
                </span>
                <div class="nav-right nav-menu">
                    @stack('right-nav-menu')
                    @if (Auth::guest())
                        <a class="nav-item is-tab" href="{{ url('/login') }}">Login</a>
                        <a class="nav-item is-tab" href="{{ url('/register') }}">Register</a>
                    @else
                        <div class="nav-item">{{ auth()->user()->name }}</div>

                        <a class="nav-item" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Logout</a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>
            </div>
        </nav>

        <!-- main content -->
        <section class="section">
            <div class="container">
                @yield('content')
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script src="/api/lang/trans.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
