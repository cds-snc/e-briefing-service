<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrip;
use App\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trips.index', [
            'trips' => Trip::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trips.create', [
            'trip' => new Trip()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTrip|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrip $request)
    {
        Trip::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('trips.index')->with('success', __('Trip created'));
    }

    /**
     * Display the specified resource.
     *
     * @param Trip $trip
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Trip $trip)
    {
        return view('trips.view', [
            'trip' => $trip
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        return view('trips.edit', [
            'trip' => $trip
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreTrip|Request $request
     * @param Trip $trip
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(StoreTrip $request, Trip $trip)
    {
        $trip->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('trips.index')->with('success', __('Trip updated'));
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
