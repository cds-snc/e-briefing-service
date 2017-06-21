@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                @include('trips._sidebar', ['trip' => $day->trip])
            </div>

            <div class="column">
                <h1 class="title">{{ __('Edit a Day') }}</h1>

                @include('layouts.flash')

                <form action="{{ route('days.update', $day) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    @include('trips.days._form')

                    <button type="submit" class="button is-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection