<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\StorePerson;
use App\Person;
use Illuminate\Http\Request;

class EventParticipantsController extends Controller
{
    public function add(Event $event)
    {
        $event->people()->attach(request()->person, ['is_participant' => 1]);

        return redirect()->back()->with('Participant added!');
    }

    public function create(Event $event)
    {
        return view('trips.days.events.people.create', [
            'event' => $event,
            'person' => new Person()
        ]);
    }

    public function store(Event $event, StorePerson $request)
    {

    }
}
