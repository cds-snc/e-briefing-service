@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">{{ __('Create a Trip') }}</h1>

        @include('layouts.flash')

        <form action="{{ route('trips.store') }}" method="POST">
            {{ csrf_field() }}
            @include('trips._form')

            <button type="submit" class="button is-primary">Submit</button>
        </form>
    </div>
@endsection