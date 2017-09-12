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
            <h1 class="title">{{ $trip->name }} Itinerary
                <a href="{{ route('trips.days.create', $trip) }}" class="is-size-6">
                    <span class="icon">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                    Add a Day
                </a>
            </h1>

            @include('layouts.flash')

            @unless($trip->days->count())
                There are no Days added to this Trip yet!
            @endunless

            @if($trip->days->count())
                <table class="table">
                    <tr>
                        <th>Day</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                    @foreach($days as $day)
                        <tr>
                            <td>{{ $day->name }}</td>
                            <td>{{ $day->date }}</td>
                            <td class="has-text-right">
                                <a href="{{ route('days.edit', $day) }}" class="button is-default">Edit</a>
                                <a href="{{ route('days.events.index', $day) }}" class="button is-default">Schedule</a>
                                <a href="" class="button is-danger delete-item" data-id="{{ $day->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>

    <div class="modal" id="delete_modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <div class="modal-card-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-card-foot">
                <form class="is-inline" action="{{ route('days.destroy', ['day' => '__id']) }}" id="delete_form" method="POST">
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