<?php

namespace App\Http\Controllers;


use App\Day;

class DayEventsController extends Controller
{
    public function index(Day $day)
    {
        return view('trips.days.events.index', [
            'day' => $day
        ]);
    }

    public function create(Day $day)
    {
        return view('trips.days.events.create', [
            'day' => $day
        ]);
    }
}