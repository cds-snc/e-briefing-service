@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">{{ __('Edit a Trip') }}</h1>

        <form action="{{ route('trips.update', $trip) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            @include('trips._form')

            <button type="submit" class="button is-primary">Submit</button>
        </form>
    </div>
@endsection