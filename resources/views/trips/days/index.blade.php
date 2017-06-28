@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $trip])
        @endpush

        <div class="column">
            <h1 class="title">{{ $trip->name }}
                <a href="{{ route('trips.days.create', $trip) }}" class="button pull-right">Add a Day</a>
            </h1>

            @include('layouts.flash')

            @unless($trip->days->count())
                There are no Days added to this Trip yet!
            @endunless

            <div class="days">
                @foreach($days as $day)
                    <div class="day">
                        <div class="card">
                            <div class="card-content">
                                <h3 class="title is-3">{{ $day->name }}</h3>
                                <p class="title is-5">{{ $day->date }}</p>
                            </div>
                            <footer class="card-footer">
                                <a href="{{ route('days.events.index', $day) }}" class="card-footer-item">Events</a>
                                <a href="{{ route('days.edit', $day) }}" class="card-footer-item">Edit</a>
                                <a href="" class="card-footer-item">Delete</a>
                            </footer>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection