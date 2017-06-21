@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                @include('trips._sidebar', ['trip' => $trip])
            </div>

            <div class="column">
                <h1 class="title">{{ __('Add a Document') }}</h1>

                @include('layouts.flash')

                <form action="{{ route('trips.documents.store', $trip) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('trips.documents._form')

                    <button type="submit" class="button is-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection