@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="notification is-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <div class="card ">
                <header class="card-header">
                    <p class="card-header-title">
                        Reset password
                    </p>
                </header>
                <div class="card-content">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="content">
                            <div class="field">
                                <label class="label">E-mail</label>
                                <div class="control">
                                    <input name="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" type="email" value="{{ old('email') }}" required autofocus>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Password</label>
                                <div class="control">
                                    <input name="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" type="password" value="{{ old('password') }}" required>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Confirm password</label>
                                <div class="control">
                                    <input name="password_confirmation" class="input{{ $errors->has('password-confirm') ? ' is-danger' : '' }}" type="password" value="{{ old('password-confirm') }}" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <button class="button is-primary">Reset password</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
