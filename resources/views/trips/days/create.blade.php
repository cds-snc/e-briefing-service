@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">{{ __('Add a Day') }}</h1>

        <form action="{{ route('trips.days.store', $trip) }}" method="POST">
            {{ csrf_field() }}
            <div class="field">
                <label class="label" for="name">{{ __('Name') }}</label>
                <p class="control">
                    <input type="text" class="input" name="name" id="name" value="{{ old('name') }}">
                </p>
            </div>
            <div class="field">
                <label class="label" for="date">{{ __('Date') }}</label>
                <p class="control">
                    <input type="date" class="input" name="date" value="{{ old('date') }}">
                </p>
            </div>

            <button type="submit" class="button is-primary">Submit</button>
        </form>
    </div>
@endsection