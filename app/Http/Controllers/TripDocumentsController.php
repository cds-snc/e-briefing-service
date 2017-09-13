<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests\StoreDocument;
use App\Trip;
use Illuminate\Http\Request;

class TripDocumentsController extends Controller
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
    public function index(Trip $trip)
    {
        $this->authorize('manage', $trip);

        return view('trips.documents.index', [
            'trip' => $trip,
            'documentsByType' => $trip->documents->groupBy('document_type')
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

        return view('trips.documents.create', [
            'trip' => $trip,
            'document' => new Document()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Trip $trip
     * @param StoreDocument|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Trip $trip, StoreDocument $request)
    {
        $this->authorize('manage', $trip);
        
        $file = $request->file('file');
        $filename = $file->store('documents', 'public');

        $trip->documents()->create([
            'name' => $request->name,
            'document_type' => $request->document_type,
            'file' => $filename,
            'is_protected' => $request->has('is_protected')
        ]);

        return redirect()->route('trips.documents.index', $trip)->with('success', 'Document uploaded!');
    }
}
