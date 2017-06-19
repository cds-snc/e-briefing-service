@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">{{ __('Edit a Trip') }}</h1>

        <form action="{{ route('trips.update', $trip) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class="field">
                <label class="label" for="name">{{ __('Trip name') }}</label>
                <p class="control">
                    <input type="text" class="input" name="name" id="name" value="{{ old('name', $trip->name) }}">
                </p>
            </div>
            <div class="field">
                <label class="label" for="description">{{ __('Description') }}</label>
                <textarea name="description" id="description" class="textarea">{{ old('description', $trip->description) }}</textarea>
            </div>

            <button type="submit" class="button is-primary">Submit</button>
        </form>
    </div>
@endsection