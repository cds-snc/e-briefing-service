@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $event->trip])
        @endpush

        <div class="column">
            <h1 class="title">{{ $event->day->name }} : Edit an Event</h1>

            @include('layouts.flash')

            <form action="{{ route('events.update', ['event' => $event]) }}" method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                @include('trips.days.events._form')

                <button type="submit" class="button is-primary">Submit</button>
            </form>
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