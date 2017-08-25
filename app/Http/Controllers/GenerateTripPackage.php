<?php

namespace App\Http\Controllers;

use App\Article;
use App\Day;
use App\Document;
use App\Event;
use App\Person;
use App\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GenerateTripPackage extends Controller
{
    public function __invoke(Trip $trip)
    {
        $this->generateTripJson($trip);

        return redirect()->back()->with('success', 'Files generated');
    }

    protected function generateTripJson(Trip $trip)
    {
        $json = $trip->with('days')->first()->toJson();

        Storage::put('package/trip.json', $json);

        foreach ($trip->days as $day)
        {
            $this->generateDayJson($day);

            foreach ($day->events as $event) {
                $this->generateEventJson($event);
            }
        }

        foreach ($trip->documents as $document)
        {
            $this->generateDocumentJson($document);
        }

        foreach ($trip->articles as $article)
        {
            $this->generateArticleJson($article);
        }

        foreach ($trip->people as $person)
        {
            $this->generatePersonJson($person);
        }
    }

    protected function generateDayJson(Day $day)
    {
        $json = Day::with('events')->find($day->id)->toJson();

        Storage::put('package/days/' . $day->id . '.json', $json);
    }

    protected function generateDocumentJson(Document $document)
    {
        $json = $document->toJson();

        Storage::put('package/documents/' . $document->id . '.json', $json);
    }

    protected function generateEventJson(Event $event)
    {
        $json = Event::with('contacts', 'participants', 'documents')->find($event->id)->toJson();

        Storage::put('package/events/' . $event->id . '.json', $json);
    }

    protected function generateArticleJson(Article $article)
    {
        $json = Article::with('documents')->find($article->id)->toJson();

        Storage::put('package/articles/' . $article->id . '.json', $json);
    }

    protected function generatePersonJson(Person $person)
    {
        $json = $person->toJson();

        Storage::put('package/people/' . $person->id . '.json', $json);
    }
}
