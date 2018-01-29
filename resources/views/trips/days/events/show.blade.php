@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $event->trip])
        @endpush

        <div class="column">
            @include('layouts.flash')

            <h1 class="title"><a href="{{ route('days.events.index', $event->day) }}">{{ $event->day->name }}</a> : {{ $event->title }}</h1>

            <div class="columns">
                <div class="column">
                    <a href="{{ route('events.edit', $event) }}" class="button">Edit Details</a>
                    <dl class="details-list">
                        @if($event->type)
                            <dt>Event type</dt>
                            <dd>{{ $event->type }}</dd>
                        @endif
                        <dt>Time from</dt>
                        <dd>{{ $event->time_from }}</dd>
                        @if($event->time_to)
                            <dt>Time to</dt>
                            <dd>{{ $event->time_to }}</dd>
                        @endif
                        @if($event->location_name)
                            <dt>Location</dt>
                            <dd>{{ $event->location_name }}</dd>
                        @endif
                        @if($event->location_address)
                            <dd>{{ $event->location_address }}</dd>
                        @endif
                        @if($event->location_postal)
                            <dd>{{ $event->location_postal }}</dd>
                        @endif
                        @if($event->description)
                            {!! Markdown::setBreaksEnabled(true)->parse($event->description) !!}
                        @endif
                        @if($event->body)
                            {!! Markdown::setBreaksEnabled(true)->parse($event->body) !!}
                        @endif
                    </dl>
                </div>
                <div class="column">
                    <h3 class="title">Contacts
                        <button class="button is-default pull-right" @click="isContactModalActive = true">Add a Contact</button>
                    </h3>

                    @unless($event->contacts->count())
                        <div class="notification is-info">
                            There are no Contacts associated with this Event yet.
                        </div>
                    @endunless

                    @foreach($event->contacts as $contact)
                        <div class="columns">
                            <div class="column is-three-quarters">
                                <p><strong>{{ $contact->name }}</strong><br>
                                    {{ $contact->title }}<br>
                                    {{ $contact->telephone }}</p>
                            </div>
                            <div class="column has-text-right">
                                <form action="{{ route('events.contacts.remove', ['event' => $event, 'person' => $contact]) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="button is-link">Remove</button>
                                </form>
                            </div>
                        </div>

                    @endforeach

                    <h3 class="title">Participants
                        <button class="button is-default pull-right" @click="isParticipantModalActive = true">Add a Participant</button>
                    </h3>

                    @unless($event->participants->count())
                        <div class="notification is-info">
                            There are no people associated with this Event yet.
                        </div>
                    @endunless

                    @foreach($event->participants as $participant)
                        <div class="columns">
                            @if($participant->image)
                                <div class="column is-2">
                                    <img src="{{ url('storage/' . $participant->image) }}" class="person-photo-fluid">
                                </div>
                            @endif
                            <div class="column">
                                {{ $participant->name }}<br>
                                {{ $participant->title }}
                            </div>
                            <div class="column has-text-right">
                                <form action="{{ route('events.participants.remove', ['event' => $event, 'person' => $participant]) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="button is-link">Remove</button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    <h3 class="title">Documents
                        <button class="button is-default pull-right" @click="isDocumentModalActive = true">Add a Document</button>
                    </h3>

                    @unless($event->documents->count())
                        <div class="notification is-info">
                            There are no Documents associated with this Event yet.
                        </div>
                    @endunless

                    @if($event->documents->count())

                        @foreach($event->documents as $document)
                            <div class="columns">
                                <div class="column is-three-quarters">
                                    <a href="{{ url('storage/' . $document->file) }}">{{ $document->name }}</a>
                                    @if($document->is_protected)
                                        <span class="icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    @endif
                                </div>
                                <div class="column">
                                    <form action="{{ route('events.documents.remove', ['event' => $event, 'document' => $document]) }}" method="post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button class="button is-link">Remove</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                    @endif
                </div>
            </div>
        </div>
    </div>
    <add-participant-modal
            :active.sync="isParticipantModalActive"
            :event="'{{ $event->id }}'"
            :csrf_token="'{{ csrf_token() }}'">
    </add-participant-modal>

    <add-contact-modal
            :active.sync="isContactModalActive"
            :event="'{{ $event->id }}'"
            :csrf_token="'{{ csrf_token() }}'">
    </add-contact-modal>

    <add-document-modal
            :active.sync="isDocumentModalActive"
            :event="'{{ $event->id }}'"
            :csrf_token="'{{ csrf_token() }}'">
    </add-document-modal>
@endsection