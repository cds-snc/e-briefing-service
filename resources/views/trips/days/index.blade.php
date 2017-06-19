@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                @include('trips._sidebar', ['trip' => $trip])
            </div>

            <div class="column">
                <h1 class="title">{{ $trip->name }}
                    <a href="{{ route('trips.days.create', $trip) }}" class="button pull-right">Add a Day</a>
                </h1>
                @unless($trip->days->count())
                    There are no Days added to this Trip yet!
                @endunless

                <div class="days">
                    @foreach($trip->days as $day)
                        <div class="day">
                            <div class="card">
                                <div class="card-content">
                                    <h3 class="title is-3">{{ $day->name }}</h3>
                                    <p class="title is-5">{{ $day->date }}</p>
                                </div>
                                <footer class="card-footer">
                                    <a href="{{ route('days.events.index', $day) }}" class="card-footer-item">Events</a>
                                    <a href="" class="card-footer-item">Edit</a>
                                    <a href="" class="card-footer-item">Delete</a>
                                </footer>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection