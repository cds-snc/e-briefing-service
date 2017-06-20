@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                @include('trips._sidebar', ['trip' => $trip])
            </div>

            <div class="column">
                <h1 class="title">{{ __('Add a Person') }}</h1>

                <form action="{{ route('trips.people.store', $trip) }}" method="POST">
                    {{ csrf_field() }}
                    @include('trips.people._form')

                    <button type="submit" class="button is-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection