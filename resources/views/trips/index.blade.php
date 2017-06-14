@extends('layouts.app')

@push('scripts')
<script>
    $(document).ready(function() {
        $('.edit-link').on('click', function(e) {
            e.preventDefault();

            var id = $(this).attr('data-id');
            var url = '/trips/' + id;

            $.ajax({
                url: url,
                method: 'GET'
            }).then(function(response) {
                $('#tripForm')
                    .find('[name="id"]').val(response.id).end()
                    .find('[name="name"]').val(response.name).end()
                    .find('[name="description"]').val(response.description).end()
                    .find('[name="_method"]').val('PUT').end()
                    .attr('action', url);

                bootbox.dialog({
                    title: '{{ __('Edit Trip') }}',
                    message: $('#tripForm'),
                    show: false
                })
                    .on('shown.bs.modal', function() {
                        $('#tripForm').show();
                    })
                    .on('hide.bs.modal', function(e) {
                        $('#tripForm').hide().appendTo('body');
                    })
                    .modal('show');
            });
        });

        $('.create-link').on('click', function(e) {
            e.preventDefault();

            var url = '/trips';

            $('#tripForm')
                .find('[name="id"]').val('').end()
                .find('[name="name"]').val('').end()
                .find('[name="description"]').val('').end()
                .find('[name="_method"]').val('POST').end()
                .attr('action', url);

            bootbox.dialog({
                title: '{{ __('Create a Trip') }}',
                message: $('#tripForm'),
                show: false
            })
                .on('shown.bs.modal', function() {
                    $('#tripForm').show();
                })
                .on('hide.bs.modal', function() {
                    $('#tripForm').hide().appendTo('body');
                })
                .modal('show');
        });
    });
</script>
@endpush

@section('content')
    <div class="container">
        <h1>{{ __('Trips') }}
            <a href="{{ route('trips.create') }}" class="btn btn-default pull-right create-link">{{ __('Create a Trip') }}</a>
        </h1>

        @include('layouts.notifications')

        @unless($trips->count())
            {{ __('There are currently no trips defined') }}
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('Trip name') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trips as $trip)
                        <tr>
                            <td>{{ $trip->name }}</td>
                            <td>
                                <a href="{{ route('trips.edit', $trip) }}" data-id="{{ $trip->id }}" class="edit-link">{{ __('edit') }}</a> |
                                <a href="{{ route('trips.show', $trip) }}">{{ __('manage') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endunless
    </div>

    <form action="" method="POST" id="tripForm" style="display: none">
        {{ csrf_field() }}
        <input type="hidden" name="id">
        <input type="hidden" name="_method" value="">

        <div class="form-group">
            <label for="name">{{ __('Trip name') }}</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('Trip name') }}">
        </div>
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection