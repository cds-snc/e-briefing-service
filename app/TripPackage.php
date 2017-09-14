<?php

namespace App;


use Chumper\Zipper\Facades\Zipper;
use Illuminate\Support\Facades\Storage;

class TripPackage
{
    var $storage_path;

    public function generate(Trip $trip)
    {
        $this->storage_path = 'public/packages/trips/' . $trip->id;

        // Delete old package
        Storage::deleteDirectory($this->storage_path);

        $this->generateTripJson($trip);
        $zip = $this->zipPackage();

        return $zip;
    }

    protected function generateTripJson(Trip $trip)
    {
        $trip = Trip::with('days')->find($trip->id);
        $trip->update_url = url('/api/trips/' . $trip->id . '/download');

        $trip_json = $trip->toJson();
        Storage::put($this->storage_path . '/trip.json', $trip_json);

        $days_json = $trip->days()->orderBy('date')->get()->toJson();
        Storage::put($this->storage_path . '/days.json', $days_json);

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

        Storage::put($this->storage_path . '/days/' . $day->id . '.json', $json);
    }

    protected function generateDocumentsJson(Trip $trip)
    {
        $documents = $trip->documents->groupBy('document_type');

        Storage::put($this->storage_path . '/documents.json', $documents->toJson());
    }

    protected function generateDocumentJson(Document $document)
    {
        $json = $document->toJson();

        Storage::put($this->storage_path . '/documents/' . $document->id . '.json', $json);
        Storage::copy('public/' . $document->file, $this->storage_path . '/assets/' . $document->file);
    }

    protected function generateEventJson(Event $event)
    {
        $json = Event::with('contacts', 'participants', 'documents')->find($event->id)->toJson();

        Storage::put($this->storage_path . '/events/' . $event->id . '.json', $json);
    }

    protected function generateArticlesJson(Trip $trip)
    {
        $json = $trip->articles->toJson();

        Storage::put($this->storage_path . '/articles.json', $json);
    }

    protected function generateArticleJson(Article $article)
    {
        $json = Article::with('documents')->find($article->id)->toJson();

        Storage::put($this->storage_path . '/articles/' . $article->id . '.json', $json);
    }

    protected function generatePeopleJson(Trip $trip)
    {
        $json = $trip->people->toJson();

        Storage::put($this->storage_path . '/people.json', $json);
    }

    protected function generatePersonJson(Person $person)
    {
        $json = $person->toJson();

        Storage::put($this->storage_path . '/people/' . $person->id . '.json', $json);

        if ($person->image) {
            Storage::copy('public/' . $person->image, $this->storage_path . '/assets/' . $person->image);
        }
    }

    protected function zipPackage()
    {
        $files = glob(storage_path('app/' . $this->storage_path));
        $zip = storage_path('app/' . $this->storage_path . '/') . 'package.zip';

        Zipper::make($zip)->add($files)->close();

        return $zip;
    }
}