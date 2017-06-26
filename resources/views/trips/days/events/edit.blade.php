@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-2">
                @include('trips._sidebar', ['trip' => $day->trip])
            </div>

            <div class="column">
                <h1 class="title">{{ $day->name }} : Edit an Event</h1>

                @include('layouts.flash')

                <div class="columns">
                    <div class="column">
                        <form action="{{ route('days.events.update', ['day' => $day, 'event' => $event]) }}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            @include('trips.days.events._form')

                            <button type="submit" class="button is-primary">Submit</button>
                        </form>
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
    </div>

    <div class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="field">
                <label class="label">Add a person</label>
                <p class="control">
                    <span class="select">
                        {!! Form::select('person_id', $people, null, ['placeholder' => 'Select a person']) !!}
                    </span>
                </p>
                <p class="help">You may add People to this Event.  A person can be a Contact and/or a Participant</p>
            </div>
        </div>
        <button class="modal-close"></button>
    </div>
@endsection