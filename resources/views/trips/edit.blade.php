@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $trip])
        @endpush
        <div class="column">
            <h1 class="title">{{ __('Edit Details') }}</h1>

            @include('layouts.flash')

            <form action="{{ route('trips.update', $trip) }}" method="POST" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="file has-name">
                    <label class="file-label">
                        <input class="file-input" type="file" name="image" id="file">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fa fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Choose a photo...
                            </span>
                        </span>
                        <span class="file-name" id="file-name">
                            ...
                        </span>
                    </label>
                </div>
                <br />
                
                @include('trips._form')

                <button type="submit" class="button is-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection