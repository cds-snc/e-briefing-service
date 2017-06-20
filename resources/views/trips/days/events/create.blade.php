@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                @include('trips._sidebar', ['trip' => $day->trip])
            </div>

            <div class="column">
                <h1 class="title">{{ $day->name }} : Create an Event</h1>

                <form action="{{ route('days.events.store', $day) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="field">
                        <label class="label" for="title">{{ __('Title') }}</label>
                        <p class="control">
                            <input type="text" class="input" name="title" id="title" value="{{ old('title') }}">
                        </p>
                    </div>

                    <div class="field">
                        <label class="label" for="type">{{ __('Type') }}</label>
                        <p class="control">
                            <input type="text" class="input" name="type" id="type" value="{{ old('type') }}">
                        </p>
                    </div>

                    <div class="field">
                        <label class="label" for="time_from">{{ __('Time from') }}</label>
                        <p class="control">
                            <input type="time" class="input" name="time_from" id="time_from" value="{{ old('time_from') }}">
                        </p>
                    </div>

                    <div class="field">
                        <label class="label" for="time_to">{{ __('Time to') }}</label>
                        <p class="control">
                            <input type="time" class="input" name="time_to" id="time_to" value="{{ old('time_to') }}">
                        </p>
                    </div>

                    <div class="field">
                        <label class="label" for="location_name">{{ __('Location name') }}</label>
                        <p class="control">
                            <input type="text" class="input" name="location_name" id="location_name" value="{{ old('location_name') }}">
                        </p>
                    </div>

                    <div class="field">
                        <label class="label" for="location_address">{{ __('Address') }}</label>
                        <p class="control">
                            <input type="text" class="input" name="location_address" id="location_address" value="{{ old('location_address') }}">
                        </p>
                    </div>

                    <div class="field">
                        <label class="label" for="location_postal">{{ __('Postal') }}</label>
                        <p class="control">
                            <input type="text" class="input" name="location_postal" id="location_postal" value="{{ old('location_postal') }}">
                        </p>
                    </div>

                    <div class="field">
                        <label class="label" for="description">Brief Description</label>
                        <p class="control">
                            <textarea class="textarea" id="description" name="description"></textarea>
                        </p>
                    </div>

                    <div class="field">
                        <label class="label" for="body">Body</label>
                        <p class="control">
                            <textarea class="textarea" id="body" name="body"></textarea>
                        </p>
                    </div>

                    <div class="field">
                        <p class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="is_meal">
                                Is a meal?
                            </label>
                        </p>
                    </div>


                    <button type="submit" class="button is-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection