<?php

namespace App\Http\Controllers;

use App\Day;
use App\Http\Requests\StoreDay;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function edit(Day $day)
    {
        $this->authorize('manage', $day->trip);

        return view('trips.days.edit', [
            'day' => $day
        ]);
    }

    public function update(Day $day, StoreDay $request)
    {
        $this->authorize('manage', $day->trip);

        $day->update([
            'name' => $request->name,
            'date' => $request->date
        ]);

        return redirect()->route('trips.days.index', $day->trip);
    }

    public function destroy(Day $day)
    {
        $this->authorize('manage', $day->trip);
        
        $day->delete();

        return redirect()->route('trips.days.index', $day->trip)->with('success', 'Day deleted');
    }
}
