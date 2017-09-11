@extends('layouts.app')

@push('scripts')

<script>
    $('document').ready(function () {
        $('.delete-item').click(function () {
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

            <div class="days">
                @foreach($days as $day)
                    <div class="day">
                        <div class="card">
                            <div class="card-content">
                                <h3 class="title is-3">{{ $day->name }}</h3>
                                <p class="title is-5">{{ $day->date }}</p>
                            </div>
                            <footer class="card-footer">
                                <div class="card-footer-item">
                                    <a href="{{ route('days.events.index', $day) }}" class="button is-link badge" data-badge="{{ $day->events->count() }}">Itinerary</a>
                                </div>
                                <div class="card-footer-item">
                                    <a href="{{ route('days.edit', $day) }}" class="button is-link">Edit</a>
                                </div>
                                <div class="card-footer-item">
                                    <a href="#" class="button is-link delete-item" data-id="{{ $day->id }}">Delete</a>
                                </div>
                            </footer>
                        </div>
                    </div>
                @endforeach
            </div>
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