@extends('layouts.app')

@push('scripts')

<script>
    $('document').ready(function () {
        $('.delete-item').click(function (e) {
            e.preventDefault();

            $('#delete_form')[0].action = $('#delete_form')[0].action.replace('__id', $(this).data('id'));
            $('#delete_modal').addClass('is-active');
        });

        $('.modal-background').click(function() {
            $(this).parent().removeClass('is-active');
        });

        $('.cancel-modal').click(function() {
            $(this).parents('.modal').removeClass('is-active');
        });
    });
</script>

@endpush

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

            @foreach($documentsByType as $type => $documents)
                <h2>{{ $type }}</h2>
                <table class="table">
                    @foreach($documents as $document)
                        <tr>
                            <td><a href="{{ url('storage/' . $document->file) }}">{{ $document->name }}</a>
                                @if($document->is_protected)
                                    <span class="icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                @endif
                            </td>
                            <td class="has-text-right">
                                <a href="{{ route('documents.edit', $document) }}" class="button is-default">Edit</a>
                                <a href="" class="button is-danger delete-item" data-id="{{ $document->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endforeach
        </div>
    </div>

    <div class="modal" id="delete_modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <div class="modal-card-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-card-foot">
                <form class="is-inline" action="{{ route('documents.destroy', ['document' => '__id']) }}" id="delete_form" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="button" class="cancel-modal button is-default">Cancel</button>
                    <button type="submit" class="button is-danger">Delete</button>
                </form>
            </div>
        </div>
        <button class="modal-close is-large" aria-label="close"></button>
    </div>
@endsection