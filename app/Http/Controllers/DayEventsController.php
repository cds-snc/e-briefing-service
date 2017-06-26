<?php

namespace App\Http\Controllers;


use App\Day;
use App\Event;
use App\Http\Requests\StoreEvent;
use Illuminate\Http\Request;

class DayEventsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(Day $day)
    {
        return view('trips.days.events.index', [
            'day' => $day,
            'events' => $day->events()->orderBy('time_from')->get()
        ]);
    }

    public function create(Day $day)
    {
        return view('trips.days.events.create', [
            'day' => $day,
            'event' => new Event()
        ]);
    }

    public function store(Day $day, StoreEvent $request)
    {
        $day->events()->create([
            'title' => $request->title,
            'type' => $request->type,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            'location_name' => $request->location_name,
            'location_address' => $request->location_address,
            'location_postal' => $request->location_postal,
            'description' => $request->description,
            'body' => $request->body,
            'is_meal' => $request->has('is_meal')
        ]);

        return redirect()->route('days.events.index', $day)->with('success', 'Event saved!');
    }

    public function edit(Day $day, Event $event)
    {
        return view('trips.days.events.edit', [
            'day' => $day,
            'event' => $event,
            'people' => $day->trip->people->pluck('name', 'id')
        ]);
    }

    public function update(Day $day, Event $event, StoreEvent $request)
    {
        $event->update([
            'title' => $request->title,
            'type' => $request->type,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            'location_name' => $request->location_name,
            'location_address' => $request->location_address,
            'location_postal' => $request->location_postal,
            'description' => $request->description,
            'body' => $request->body,
            'is_meal' => $request->has('is_meal')
        ]);

        return redirect()->route('days.events.index', $day)->with('success', 'Event saved!');
    }
}