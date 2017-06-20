<?php

namespace App\Http\Controllers;

use App\Day;
use App\Http\Requests\StoreDay;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function edit(Day $day)
    {
        return view('trips.days.edit', [
            'day' => $day
        ]);
    }

    public function update(Day $day, StoreDay $request)
    {
        $day->update([
            'name' => $request->name,
            'date' => $request->date
        ]);

        return redirect()->route('trips.days.index', $day->trip);
    }

    public function destroy(Day $day)
    {
        $day->delete();

        return redirect()->route('trips.days.index', $day->trip);
    }
}
