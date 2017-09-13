@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $trip])
        @endpush

        <div class="column">
            <h1 class="title">{{ __('Edit a Document') }}</h1>

            @include('layouts.flash')

            <form action="{{ route('documents.update', $document) }}" method="POST" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="field">
                    <label class="label" for="name">{{ __('Document name') }}</label>
                    <p class="control">
                        <input type="text" class="input" name="name" id="name" value="{{ old('name', $document->name) }}">
                    </p>
                </div>

                <!-- @TODO: add autocomplete/suggestions based on existing categories in this trip -->
                <div class="field">
                    <label class="label" for="document_type">{{ __('Document type') }}</label>
                    <p class="control">
                        <input type="text" class="input" name="document_type" id="document_type" value="{{ old('document_type', $document->document_type) }}">
                    </p>
                </div>

                <strong>Document file (PDF only)</strong>
                <div class="file has-name">
                    <label class="file-label">
                        <input class="file-input" type="file" name="file" id="file">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fa fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Choose a file...
                            </span>
                        </span>
                        <span class="file-name" id="file-name">
                            ...
                        </span>
                    </label>
                </div>
                <p class="help">* Selecting a new file will replace the existing file</p>

                <button type="submit" class="button is-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection