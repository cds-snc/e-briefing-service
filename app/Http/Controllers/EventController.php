<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\StoreEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function show(Event $event)
    {
        $this->authorize('manage', $event->trip);

        return view('trips.days.events.show', [
            'event' => $event,
            'documents' => $event->trip->documents->pluck('name', 'id')
        ]);
    }

    public function edit(Event $event)
    {
        $this->authorize('manage', $event->trip);

        return view('trips.days.events.edit', [
            'event' => $event,
            'people' => $event->trip->people->pluck('name', 'id')
        ]);
    }

    public function update(Event $event, StoreEvent $request)
    {
        $this->authorize('manage', $event->trip);

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

        return redirect()->route('events.show', $event)->with('success', 'Event saved!');
    }

    public function destroy(Event $event)
    {
        $this->authorize('manage', $event->trip);
        
        $event->delete();

        return redirect()->back()->with('success', 'Event deleted');
    }
}
