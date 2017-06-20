@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                @include('trips._sidebar', ['trip' => $trip])
            </div>

            <div class="column">
                <h1 class="title">{{ $trip->name }}
                    <a href="{{ route('trips.people.create', $trip) }}" class="button pull-right">Add a Person</a>
                </h1>
                @unless($trip->people->count())
                    There are no People added to this Trip yet!
                @endunless

                @foreach($people as $person)
                    <div class="card">
                        <div class="card-content">
                            <h3 class="title is-3">{{ $person->name }}</h3>
                            <p><strong>{{ $person->title or 'no title' }}</strong> | {{ $person->telephone }}</p>
                            <p><a href="{{ route('trips.people.edit', ['trip' => $trip, 'person' => $person]) }}">Edit</a> | <a href="">Delete</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection