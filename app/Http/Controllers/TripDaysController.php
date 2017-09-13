<?php

namespace App\Http\Controllers;


use App\Day;
use App\Http\Requests\StoreDay;
use App\Trip;

class TripDaysController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(Trip $trip)
    {
        $this->authorize('manage', $trip);

        return view('trips.days.index', [
            'trip' => $trip,
            'days' => $trip->days()->orderBy('date')->get()
        ]);
    }

    public function create(Trip $trip)
    {
        $this->authorize('manage', $trip);

        return view('trips.days.create', [
            'trip' => $trip,
            'day' => new Day()
        ]);
    }

    public function store(Trip $trip, StoreDay $request)
    {
        $this->authorize('manage', $trip);
        
        $trip->days()->create([
            'name' => $request->name,
            'date' => $request->date
        ]);

        return redirect()->route('trips.days.index', $trip)->with('success', 'Day added!');
    }
}