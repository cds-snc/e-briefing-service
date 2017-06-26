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
        $file = $request->file('image');
        $filename = $file->store('photos', 'public');

        $trip->people()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'title' => $request->title,
            'body' => $request->body,
            'image' => $filename,
        ]);

        return redirect()->route('trips.people.index', $trip)->with('success', 'Person saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Trip $trip
     * @param Person $person
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Trip $trip, Person $person)
    {
        return view('trips.people.edit', compact(['trip', 'person']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Trip $trip
     * @param Person $person
     * @param StorePerson|Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Trip $trip, Person $person, StorePerson $request)
    {
        $person->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'title' => $request->title,
            'body' => $request->body
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->store('photos', 'public');

            $person->update([
                'image' => $filename
            ]);
        }

        return redirect()->route('trips.people.index', $trip)->with('success', 'Person saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
