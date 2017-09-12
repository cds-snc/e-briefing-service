<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\StorePerson;
use App\Person;
use Illuminate\Http\Request;

class EventContactsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function add(Event $event)
    {
        $event->people()->attach(request()->person, ['is_contact' => 1]);

        return redirect()->back()->with('success', 'Contact added!');
    }

    public function create(Event $event)
    {
        return view('trips.days.events.contacts.create', [
            'event' => $event,
            'person' => new Person()
        ]);
    }

    public function store(Event $event, StorePerson $request)
    {
        $trip = $event->trip;

        $person = $trip->people()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'title' => $request->title,
            'body' => $request->body
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->store('photos', 'public');

            $person->update([
                'image' => $filename
            ]);
        }

        $event->people()->attach($person->id, ['is_contact' => 1]);

        return redirect()->route('events.show', $event)->with('success', 'Contact added!');
    }
}
