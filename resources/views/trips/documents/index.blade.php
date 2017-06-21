@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                @include('trips._sidebar', ['trip' => $trip])
            </div>

            <div class="column">
                <h1 class="title">{{ $trip->name }} Documents
                    <a href="{{ route('trips.documents.create', $trip) }}" class="button pull-right">Add a Document</a>
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
                            <p>
                                <a href="{{ route('trips.documents.edit', ['trip' => $trip, 'document' => $document]) }}">Edit</a> |

                                <a href="{{ route('trips.documents.destroy', ['trip' => $trip, 'document' => $document]) }}"
                                   onclick="event.preventDefault(); document.getElementById('document-delete-form').submit();">
                                    Delete</a>

                                <form id="document-delete-form" action="{{ route('trips.documents.destroy', ['trip' => $trip, 'document' => $document]) }}" method="POST" style="display: none;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                </form>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection