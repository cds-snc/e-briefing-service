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
            @include('trips._sidebar', ['trip' => $day->trip])
        @endpush

        <div class="column">
            <h1 class="title">{{ $day->trip->name }} : {{ $day->name }}
                <a href="{{ route('days.events.create', $day) }}" class="is-size-6">
                    <span class="icon">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                    Add an Event
                </a>
            </h1>

            @include('layouts.flash')

            @unless($day->events->count())
                <div class="notification is-info">
                    No Events have been added to this day yet!
                </div>
            @endunless

            @foreach($events as $event)
                <div class="card">
                    <div class="card-content">
                        <h3 class="title is-4">{{ $event->title }}</h3>
                        <h4 class="subtitle is-5">{{ $event->type }}</h4>
                        <p>{{ $event->time_from }}
                            @if($event->time_to)
                                - {{ $event->time_to }}
                            @endif
                        </p>
                        <p>{!! $event->description_html !!}</p>
                        @if($event->is_meal)
                            <span class="fa fa-cutlery"></span>
                        @endif

                        <a href="{{ route('events.show', ['event' => $event]) }}" class="button is-default">Manage</a>

                        <a href="" class="button is-danger delete-item" data-id="{{ $event->id }}">Delete</a>
                    </div>
                </div>
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
                <form class="is-inline" action="{{ route('events.destroy', ['event' => '__id']) }}" id="delete_form" method="POST">
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