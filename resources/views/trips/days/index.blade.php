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
                                <div class="card-footer-item">
                                    <a href="{{ route('days.events.index', $day) }}" class="button is-link">Events</a>
                                </div>
                                <div class="card-footer-item">
                                    <a href="{{ route('days.edit', $day) }}" class="button is-link">Edit</a>
                                </div>
                                <div class="card-footer-item">
                                    <form class="is-inline" action="{{ route('trips.days.destroy', ['trip' => $trip, 'day' => $day]) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="button is-link">Delete</button>
                                    </form>
                                </div>
                            </footer>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection