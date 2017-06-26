@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-2">
                @include('trips._sidebar', ['trip' => $trip])
            </div>

            <div class="column">
                <h1 class="title">{{ __('Add a Day') }}</h1>

                @include('layouts.flash')

                <form action="{{ route('trips.days.store', $trip) }}" method="POST">
                    {{ csrf_field() }}
                    @include('trips.days._form')

                    <button type="submit" class="button is-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection