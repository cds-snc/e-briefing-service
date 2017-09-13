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
    <section class="section">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                <div class="card ">
                    <header class="card-header">
                        <p class="card-header-title">
                            Login
                        </p>
                    </header>
                    <div class="card-content">

                        @include('layouts.flash')

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="content">
                                <div class="field">
                                    <label class="label">{{ __('Email') }}</label>
                                    <div class="control">
                                        <input name="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" type="email" value="{{ old('email') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label">{{ __('Password') }}</label>
                                    <div class="control">
                                        <input name="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" type="password" required>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <label class="checkbox">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Remember me
                                        </label>
                                    </div>
                                </div>

                                <div class="field is-grouped">
                                    <div class="control">
                                        <button class="button is-primary">Submit</button>
                                    </div>
                                    <div class="control">
                                        <a href="{{ url('/password/reset') }}" class="button is-link">
                                            Forgot password
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
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
