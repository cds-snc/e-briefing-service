<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventParticipantsController extends Controller
{
    public function add(Event $event)
    {
        $event->people()->attach(request()->person, ['is_participant' => 1]);

        return redirect()->back()->with('Participant added!');
    }
}
