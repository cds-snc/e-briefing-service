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
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{ url('/') }}">
                        e-Brief Management
                        <!-- <img class="nav-logo" src="/images/e-brief-logo.png" alt="E Briefing App Logo"> -->
                    </a>
                </div>
                <div class="navbar-menu">
                    @if(Auth::user())
                        <a href="{{ route('trips.index') }}" class="navbar-item">Trips</a>
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('users.index') }}" class="navbar-item">Users</a>
                        @endif
                    @endif

                    <div class="navbar-end">
                        @if (Auth::guest())
                            <a class="navbar-item" href="{{ url('/login') }}">Login</a>
                        @else
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    {{ auth()->user()->name }}
                                </a>
                                <div class="navbar-dropdown is-right">
                                    <a href="{{ route('password.edit') }}" class="navbar-item">
                                        Change Password
                                    </a>
                                    <a class="navbar-item" href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div> 
                            </div>                            
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <section class="section">
            <div class="container">
                <div class="columns">
                    @stack('nav-menu')

                    <div class="column">
                        <div class="content">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script src="/api/lang/trans.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
