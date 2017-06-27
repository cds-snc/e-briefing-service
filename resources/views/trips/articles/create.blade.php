@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-2">
                @include('trips._sidebar', ['trip' => $trip])
            </div>

            <div class="column">
                <h1 class="title">{{ __('Add an Article') }}</h1>

                @include('layouts.flash')

                <form action="{{ route('trips.articles.store', $trip) }}" method="POST">
                    {{ csrf_field() }}
                    @include('trips.articles._form')

                    <button type="submit" class="button is-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection