@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                @include('trips._sidebar', ['trip' => $trip])
            </div>

            <div class="column">
                <h1 class="title">{{ $trip->name }}</h1>
                <p>{{ $trip->description }}</p>
            </div>
        </div>
    </div>
@endsection