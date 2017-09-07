@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $trip])
        @endpush

        <div class="column">
            <h1 class="title">{{ $trip->name }} Documents
                <a href="{{ route('trips.documents.create', $trip) }}" class="is-size-6">
                    <span class="icon">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                    Add a Document
                </a>
            </h1>

            @include('layouts.flash')

            @unless($trip->documents->count())
                There are no Documents added to this Trip yet!
            @endunless

            @foreach($documents as $document)
                <div class="card">
                    <div class="card-content">
                        <h3 class="title is-3">{{ $document->name }}
                            @if($document->is_protected)
                                <span class="icon">
                                    <i class="fa fa-lock"></i>
                                </span>
                            @endif
                        </h3>
                        <a href="{{ route('trips.documents.edit', ['trip' => $trip, 'document' => $document]) }}" class="button is-default">Edit</a>

                        <form class="is-inline" id="document-delete-form" action="{{ route('trips.documents.destroy', ['trip' => $trip, 'document' => $document]) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="button is-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection