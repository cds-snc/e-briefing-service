@extends('layouts.app')

@section('content')
        <div class="columns">
            <div class="column is-2">
                @include('trips._sidebar', ['trip' => $event->trip])
            </div>

            <div class="column">
                @include('layouts.flash')

                <div class="columns">
                    <div class="column">
                        <h1 class="title"><a href="{{ route('days.events.index', $event->day) }}">{{ $event->day->name }}</a> : {{ $event->title }}
                            <a href="{{ route('events.edit', $event) }}" class="button pull-right">Edit Details</a>
                        </h1>

                        <dl class="details-list">
                            @if($event->type)
                                <dt>Event type</dt>
                                <dd>{{ $event->type }}</dd>
                            @endif
                            <dt>Time from</dt>
                            <dd>{{ $event->time_from }}</dd>
                            @if($event->time_to)
                                <dt>Time to</dt>
                                <dd>{{ $event->time_to }}</dd>
                            @endif
                            @if($event->location_name)
                                <dt>Location</dt>
                                <dd>{{ $event->location_name }}</dd>
                            @endif
                            @if($event->location_address)
                                <dd>{{ $event->location_address }}</dd>
                            @endif
                            @if($event->location_postal)
                                <dd>{{ $event->location_postal }}</dd>
                            @endif
                            @if($event->description)
                                <dt>Description</dt>
                                <dd>{{ $event->description }}</dd>
                            @endif
                            @if($event->body)
                                <dt>Body</dt>
                                <dd>{!! $event->body !!}</dd>
                            @endif
                        </dl>
                    </div>
                    <div class="column">
                        <h3 class="title">People
                            @if($people->count())
                                <a href="" class="button is-default pull-right">Add a Person</a>
                            @endif
                        </h3>
                        @if($people->count())
                            @unless($event->participants->count())
                                <div class="notification is-info">
                                    There are no people associated with this Event yet.
                                </div>
                            @endunless
                        @endif

                        @unless($people->count())
                            <div class="notification is-info">
                                There are no people associated with this Trip yet.  You will need to create some
                                using the link in the sidebar.
                            </div>
                        @endunless

                        <h3 class="title">Documents</h3>
                        ...
                    </div>
                </div>
            </div>
        </div>

    <div class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">

        </div>
        <button class="modal-close"></button>
    </div>
@endsection