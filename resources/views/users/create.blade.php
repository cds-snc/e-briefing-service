@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">{{ __('Create a User') }}</h1>

        @include('layouts.flash')

        <form action="{{ route('users.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="field">
                <label class="label" for="name">{{ __('Name') }}</label>
                <p class="control">
                    <input type="text" class="input" name="name" id="name" value="{{ old('name') }}">
                </p>
            </div>

            <div class="field">
                <label class="label" for="email">{{ __('Email') }}</label>
                <p class="control">
                    <input type="email" class="input" name="email" id="email" value="{{ old('email') }}">
                </p>
            </div>

            <div class="field">
                <label class="label" for="password">{{ __('Password') }}</label>
                <p class="control">
                    <input type="password" class="input" name="password" id="password" value="">
                </p>
            </div>

            <div class="field">
                <label class="label" for="password_confirm">{{ __('Password confirm') }}</label>
                <p class="control">
                    <input type="password" class="input" name="password_confirm" id="password_confirm">
                </p>
            </div>

            <button type="submit" class="button is-primary">Submit</button>
        </form>
    </div>
@endsection