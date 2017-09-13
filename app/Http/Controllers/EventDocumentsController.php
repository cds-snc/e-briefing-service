<?php

namespace App\Http\Controllers;

use App\Document;
use App\Event;
use App\Http\Requests\StoreDocument;
use Illuminate\Http\Request;

class EventDocumentsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function add(Event $event)
    {
        $this->authorize('manage', $event->trip);

        $event->documents()->attach(request()->document);

        return redirect()->back()->with('success', 'Document added!');
    }

    public function create(Event $event)
    {
        $this->authorize('manage', $event->trip);

        return view('trips.days.events.documents.create', [
            'event' => $event,
            'document' => new Document()
        ]);
    }

    public function store(Event $event, StoreDocument $request)
    {
        $this->authorize('manage', $event->trip);
        
        $trip = $event->trip;

        $file = $request->file('file');
        $filename = $file->store('documents', 'public');

        $document = $trip->documents()->create([
            'name' => $request->name,
            'document_type' => $request->document_type,
            'file' => $filename,
            'is_protected' => $request->has('is_protected')
        ]);

        $event->documents()->attach($document->id);

        return redirect()->route('events.show', $event)->with('success', 'Document uploaded!');
    }

    public function remove(Event $event, Document $document)
    {
        $event->documents()->detach($document);

        return redirect()->back()->with('success', 'Document removed');
    }
}
