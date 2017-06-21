@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                @include('trips._sidebar', ['trip' => $trip])
            </div>

            <div class="column">
                <h1 class="title">{{ __('Add a Person') }}</h1>

                @include('layouts.flash')

                <form action="{{ route('trips.people.store', $trip) }}" method="POST">
                    {{ csrf_field() }}

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
    </div>
@endsection