<div class="column is-2">
    <aside class="menu">
        <p class="menu-label">
            Manage Trip
        </p>
        <ul class="menu-list">
            <li><a href="{{ route('trips.show', $trip) }}">Trip</a></li>
            <li><a href="{{ route('trips.days.index', $trip) }}">Itinerary</a></li>
            <li><a href="{{ route('trips.people.index', $trip) }}">People</a></li>
            <li><a href="{{ route('trips.articles.index', $trip) }}">My Trip</a></li>
            <li><a href="{{ route('trips.documents.index', $trip) }}">Documents</a></li>
        </ul>
        @if(auth()->user()->id == $trip->creator->id)
            <hr>
            <ul class="menu-list">
                <li><a href="{{ route('trips.collaborators.index', $trip) }}">Collaborators</a></li>
            </ul>
        @endif
    </aside>
</div>