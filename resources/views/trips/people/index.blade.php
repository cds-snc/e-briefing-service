@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $trip])
        @endpush

        <div class="column">
            <h1 class="title">{{ $trip->name }} People
                <a href="{{ route('trips.people.create', $trip) }}" class="is-size-6">
                    <span class="icon">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                    Add a Person
                </a>
            </h1>

            @include('layouts.flash')

            @unless($trip->people->count())
                There are no People added to this Trip yet!
            @endunless

            @foreach($people as $person)
                <div class="card">
                    <div class="card-content">
                        <div class="columns">
                            @if($person->image)
                                <div class="column is-3">
                                    <img src="{{ url($person->image) }}" class="person-photo">
                                </div>
                            @endif
                            <div class="column">
                                <h3 class="title is-3">{{ $person->name }}</h3>
                                <p><strong>{{ $person->title or 'no title' }}</strong> | {{ $person->telephone }}</p>

                                <a href="{{ route('trips.people.edit', ['trip' => $trip, 'person' => $person]) }}" class="button is-default">Edit</a>

                                <form class="is-inline" action="{{ route('trips.people.destroy', ['trip' => $trip, 'person' => $person]) }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="button is-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection