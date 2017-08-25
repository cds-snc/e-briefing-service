@extends('layouts.app')

@section('content')
    <h1 class="title">{{ __('Trips') }}
        <a href="{{ route('trips.create') }}" class="button pull-right">{{ __('Create a Trip') }}</a>
    </h1>

    @include('layouts.flash')

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
                        <td style="text-align: right;">
                            <a href="{{ route('trips.edit', $trip) }}" class="button">
                                <span class="icon">
                                    <i class="fa fa-edit"></i>
                                </span>
                                <span>{{ __('edit') }}</span>
                            </a>
                            <a href="{{ route('trips.days.index', $trip) }}" class="button">
                                <span class="icon">
                                    <i class="fa fa-cogs"></i>
                                </span>
                                <span>
                                    {{ __('manage') }}
                                </span>
                            </a>
                            <form class="is-inline" action="{{ route('trips.generate', $trip) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="button">
                                    <span class="icon">
                                        <i class="fa fa-download"></i>
                                    </span>
                                    <span>
                                        {{ __('generate package') }}
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endunless
@endsection