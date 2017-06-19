<aside class="menu">
    <p class="menu-label">
        Manage Trip
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('trips.show', $trip) }}">Overview</a></li>
        <li><a href="{{ route('trips.days.index', $trip) }}">Days</a></li>
        <li><a href="">Events</a></li>
        <li><a href="">People</a></li>
        <li><a href="">Articles</a></li>
        <li><a href="">Documents</a></li>
    </ul>
</aside>