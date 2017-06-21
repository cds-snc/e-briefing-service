@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                @include('trips._sidebar', ['trip' => $day->trip])
            </div>

            <div class="column">
                <h1 class="title">{{ $day->name }} : Edit an Event</h1>

                @include('layouts.flash')

                <form action="{{ route('days.events.update', ['day' => $day, 'event' => $event]) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}

                    @include('trips.days.events._form')

                    <button type="submit" class="button is-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection