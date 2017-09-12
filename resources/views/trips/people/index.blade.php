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
            <h1 class="title">{{ $trip->name }} People
                <a href="{{ route('trips.people.create', $trip) }}" class="is-size-6">
                    <span class="icon">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                    Add a Person
                </a>
            </h1>

            @include('layouts.flash')

            @unless($trip->people->count())
                There are no People added to this Trip yet!
            @endunless

            @foreach($people as $person)
                <div class="card">
                    <div class="card-content">
                        <div class="columns">
                            @if($person->image)
                                <div class="column is-3">
                                    <img src="{{ url('storage/' . $person->image) }}" class="person-photo">
                                </div>
                            @endif
                            <div class="column">
                                <h3 class="title is-3">{{ $person->name }}</h3>
                                <p>
                                    @if($person->title)
                                        <strong>{{ $person->title }}</strong> |
                                    @endif
                                    {{ $person->telephone }}
                                </p>

                                <a href="{{ route('people.edit', ['person' => $person]) }}" class="button is-default">Edit</a>

                                <a href="" class="button is-danger delete-item" data-id="{{ $person->id }}">Delete</a>
                            </div>
                        </div>
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
                <form class="is-inline" action="{{ route('people.destroy', ['person' => '__id']) }}" id="delete_form" method="POST">
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