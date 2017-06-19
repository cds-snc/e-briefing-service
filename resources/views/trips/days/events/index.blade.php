@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column is-3">
            @include('trips._sidebar', ['trip' => $day->trip])
        </div>

        <div class="column">
            <h1 class="title">{{ $day->trip->name }} : {{ $day->name }}
                <a href="{{ route('days.events.create', $day) }}" class="button pull-right">Add an Event</a>
            </h1>

            @unless($day->events->count())
                No Events have been added to this day yet!
            @endunless

            @foreach($day->events as $event)
                <div class="card">
                    <div class="card-content">
                        <h3 class="title is-4">{{ $event->title }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection