@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
        @include('trips._sidebar', ['trip' => $event->trip])
        @endpush

        <div class="column">
            <h1 class="title">{{ __('Add a Person') }}</h1>

            @include('layouts.flash')

            <form action="{{ route('events.contacts.store', $event) }}" method="POST" enctype="multipart/form-data">
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
@endsection