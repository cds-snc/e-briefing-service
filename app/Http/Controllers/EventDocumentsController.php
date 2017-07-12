<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventDocumentsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function add(Event $event)
    {
        $event->documents()->attach(request()->document);

        return redirect()->back()->with('Document added!');
    }
}
