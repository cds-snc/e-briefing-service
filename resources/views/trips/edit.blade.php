@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $trip])
        @endpush
        <div class="column">
            <h1 class="title">{{ __('Edit Details') }}</h1>

            @include('layouts.flash')

            <form action="{{ route('trips.update', $trip) }}" method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                @include('trips._form')

                <button type="submit" class="button is-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection