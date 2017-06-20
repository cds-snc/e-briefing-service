@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                @include('trips._sidebar', ['trip' => $day->trip])
            </div>

            <div class="column">
                <h1 class="title">{{ $day->name }} : Create an Event</h1>

                <form action="{{ route('days.events.store', $day) }}" method="POST">
                    {{ csrf_field() }}
                    @include('trips.days.events._form')

                    <button type="submit" class="button is-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection