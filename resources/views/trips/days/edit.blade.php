@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $day->trip])
        @endpush

        <div class="column">
            <h1 class="title">{{ __('Edit a Day') }}</h1>

            @include('layouts.flash')

            <form action="{{ route('days.update', $day) }}" method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                @include('trips.days._form')

                <button type="submit" class="button is-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection