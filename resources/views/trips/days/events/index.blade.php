@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column is-2">
            @include('trips._sidebar', ['trip' => $day->trip])
        </div>

        <div class="column">
            <h1 class="title">{{ $day->trip->name }} : {{ $day->name }}
                <a href="{{ route('days.events.create', $day) }}" class="button pull-right">Add an Event</a>
            </h1>

            @include('layouts.flash')

            @unless($day->events->count())
                <div class="notification is-info">
                    No Events have been added to this day yet!
                </div>
            @endunless

            @foreach($events as $event)
                <div class="card">
                    <div class="card-content">
                        <h3 class="title is-4">{{ $event->title }}</h3>
                        <h4 class="subtitle is-5">{{ $event->type }}</h4>
                        <p>{{ $event->time_from }}
                            @if($event->time_to)
                                - {{ $event->time_to }}
                            @endif
                        </p>
                        <p>{{ $event->description }}</p>
                        @if($event->is_meal)
                            <span class="fa fa-cutlery"></span>
                        @endif

                        <p>
                            <a href="{{ route('events.show', ['event' => $event]) }}">Manage</a> |
                            <a href="">Delete</a>
                        </p>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">

        </div>
        <button class="modal-close"></button>
    </div>


@endsection