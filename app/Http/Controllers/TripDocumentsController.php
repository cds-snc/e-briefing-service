<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests\StoreDocument;
use App\Trip;
use Illuminate\Http\Request;

class TripDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Trip $trip)
    {
        return view('trips.documents.index', [
            'trip' => $trip,
            'documents' => $trip->documents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Trip $trip)
    {
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
        $file = $request->file('file');
        $filename = $file->store('public/documents');

        $trip->documents()->create([
            'name' => $request->name,
            'document_type' => $request->document_type,
            'file' => $filename,
            'is_protected' => $request->has('is_protected')
        ]);

        return redirect()->route('trips.documents.index', $trip)->with('success', 'Document uploaded!');
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
     * @param Document $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip, Document $document)
    {
        return view('trips.documents.edit', [
            'trip' => $trip,
            'document' => $document
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Trip $trip
     * @param Document $document
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Trip $trip, Document $document, Request $request)
    {
        $document->update([
            'name' => $request->name,
            'document_type' => $request->document_type,
            'is_protected' => $request->has('is_protected')
        ]);

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->store('public/documents');

            $document->update([
                'file' => $filename
            ]);
        }

        return redirect()->route('trips.documents.index', $trip)->with('success', 'Document updated');
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
