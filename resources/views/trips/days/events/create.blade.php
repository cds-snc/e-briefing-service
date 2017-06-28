@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $day->trip])
        @endpush

        <div class="column">
            <h1 class="title">{{ $day->name }} : Create an Event</h1>

            @include('layouts.flash')

            <form action="{{ route('days.events.store', $day) }}" method="POST">
                {{ csrf_field() }}
                @include('trips.days.events._form')

                <button type="submit" class="button is-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection