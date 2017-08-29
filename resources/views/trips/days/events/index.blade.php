@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $day->trip])
        @endpush

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

                        <a href="{{ route('events.show', ['event' => $event]) }}" class="button is-default">Manage</a>

                        <form class="is-inline" action="{{ route('events.destroy', ['event' => $event]) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="button is-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection