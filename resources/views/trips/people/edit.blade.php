@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $trip])
        @endpush

        <div class="column">
            <h1 class="title">{{ __('Edit a Person') }}</h1>

            @include('layouts.flash')

            <form action="{{ route('trips.people.update', ['trip' => $trip, 'person' => $person]) }}" method="POST" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                @if($person->image)
                    <img src="{{ url($person->image) }}" class="person-photo">
                @endif

                <div class="field">
                    <label class="label" for="image">{{ __('Photo') }}</label>
                    <p class="control">
                        <input type="file" name="image" id="image">
                    </p>
                </div>

                @include('trips.people._form')

                <button type="submit" class="button is-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection