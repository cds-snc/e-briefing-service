<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventContactsController extends Controller
{
    public function add(Event $event)
    {
        $event->people()->attach(request()->person, ['is_contact' => 1]);

        return redirect()->back()->with('Contact added!');
    }
}
