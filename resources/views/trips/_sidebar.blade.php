<aside class="menu">
    <p class="menu-label">
        Manage Trip
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('trips.days.index', $trip) }}">Days & Events</a></li>
        <li><a href="{{ route('trips.people.index', $trip) }}">People</a></li>
        <li><a href="{{ route('trips.articles.index', $trip) }}">Articles</a></li>
        <li><a href="{{ route('trips.documents.index', $trip) }}">Documents</a></li>
    </ul>
</aside>