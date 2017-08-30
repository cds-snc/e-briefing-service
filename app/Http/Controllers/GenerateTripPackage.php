<?php

namespace App\Http\Controllers;

use App\Article;
use App\Day;
use App\Document;
use App\Event;
use App\Person;
use App\Trip;
use Illuminate\Support\Facades\Storage;

class GenerateTripPackage extends Controller
{
    public function __invoke(Trip $trip)
    {
        // Delete old package
        Storage::deleteDirectory('package');

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

        $this->generateDocumentsJson($trip);

        foreach ($trip->documents as $document)
        {
            $this->generateDocumentJson($document);
        }

        $this->generateArticlesJson($trip);

        foreach ($trip->articles as $article)
        {
            $this->generateArticleJson($article);
        }

        $this->generatePeopleJson($trip);

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

    protected function generateDocumentsJson(Trip $trip)
    {
        $documents = $trip->documents->groupBy('document_type');

        Storage::put('package/documents.json', $documents->toJson());
    }

    protected function generateDocumentJson(Document $document)
    {
        $json = $document->toJson();

        Storage::put('package/documents/' . $document->id . '.json', $json);
        Storage::copy('public/' . $document->file, 'package/assets/' . $document->file);
    }

    protected function generateEventJson(Event $event)
    {
        $json = Event::with('contacts', 'participants', 'documents')->find($event->id)->toJson();

        Storage::put('package/events/' . $event->id . '.json', $json);
    }

    protected function generateArticlesJson(Trip $trip)
    {
        $json = $trip->articles->toJson();

        Storage::put('package/articles.json', $json);
    }

    protected function generateArticleJson(Article $article)
    {
        $json = Article::with('documents')->find($article->id)->toJson();

        Storage::put('package/articles/' . $article->id . '.json', $json);
    }

    protected function generatePeopleJson(Trip $trip)
    {
        $json = $trip->people->toJson();

        Storage::put('package/people.json', $json);
    }

    protected function generatePersonJson(Person $person)
    {
        $json = $person->toJson();

        Storage::put('package/people/' . $person->id . '.json', $json);

        if ($person->image) {
            Storage::copy('public/' . $person->image, 'package/assets/' . $person->image);
        }
    }
}
