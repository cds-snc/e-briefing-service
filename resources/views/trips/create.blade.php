@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('Create a Trip') }}</h1>
        <form action="{{ route('trips.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">{{ __('Trip name') }}</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('Trip name') }}">
            </div>
            <div class="form-group">
                <label for="description">{{ __('Description') }}</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@endsection