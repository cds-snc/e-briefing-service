<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerson;
use App\Person;
use App\Trip;
use Illuminate\Http\Request;

class TripPeopleController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function index(Trip $trip)
    {
        $this->authorize('manage', $trip);

        return view('trips.people.index', [
            'trip' => $trip,
            'people' => $trip->people
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Trip $trip)
    {
        $this->authorize('manage', $trip);

        return view('trips.people.create', [
            'trip' => $trip,
            'person' => new Person()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Trip $trip
     * @param StorePerson|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Trip $trip, StorePerson $request)
    {
        $this->authorize('manage', $trip);
        
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

        return redirect()->route('trips.people.index', $trip)->with('success', 'Person saved!');
    }
}
