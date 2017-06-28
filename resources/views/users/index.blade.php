@extends('layouts.app')

@section('content')
    <h1 class="title">{{ __('Users') }}
        <a href="{{ route('users.create') }}" class="button pull-right">Create a User</a>
    </h1>

    @unless($users->count())
        {{ __('There are currently no users defined') }}
    @else
        <table class="table">
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th></th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td></td>
                </tr>
            @endforeach
        </table>
    @endunless
@endsection