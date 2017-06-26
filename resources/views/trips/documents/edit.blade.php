@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-2">
                @include('trips._sidebar', ['trip' => $trip])
            </div>

            <div class="column">
                <h1 class="title">{{ __('Edit a Document') }}</h1>

                @include('layouts.flash')

                <form action="{{ route('trips.documents.update', ['trip' => $trip, 'document' => $document]) }}" method="POST" enctype="multipart/form-data">
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

                    <div class="box">
                        <article class="media">
                            <div class="media-left">
                                <figure class="image is-128x128">
                                    <img src="http://bulma.io/images/placeholders/128x128.png" alt="Image">
                                </figure>
                            </div>
                            <div class="media-content">
                                {{ $document->name }}
                                <div class="pull-right">
                                    <a href="" class="button">View</a>
                                    <a href="" class="button">Remove</a>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="field">
                        <p class="control">
                            <input type="file" name="file" id="file">
                        </p>
                        <p class="help">* Selecting a new file will replace the existing file</p>
                    </div>

                    <div class="field">
                        <p class="control">
                            <label class="checkbox">
                                {{ Form::checkbox('is_protected', 1, $document->is_protected) }}
                                Contains protected information
                            </label>
                        </p>
                        <p class="help">* Protected information cannot be synced to devices remotely</p>
                    </div>


                    <button type="submit" class="button is-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection