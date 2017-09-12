<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];
    protected $appends = ['description_html', 'body_html'];
    protected $touches = ['day'];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function people()
    {
        return $this->belongsToMany(Person::class);
    }

    public function participants()
    {
        return $this->belongsToMany(Person::class)->wherePivot('is_participant', 1);
    }

    public function contacts()
    {
        return $this->belongsToMany(Person::class)->wherePivot('is_contact', 1);
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

    public function getTripAttribute()
    {
        return $this->day->trip;
    }

    public function getAvailableContactsAttribute()
    {
        return $this->trip->people->diff($this->contacts);
    }

    public function getAvailableParticipantsAttribute()
    {
        return $this->trip->people->diff($this->participants);
    }

    public function getAvailableDocumentsAttribute()
    {
        return $this->trip->documents->diff($this->documents);
    }

    public function getDescriptionHtmlAttribute()
    {
        return \Markdown::text($this->description);
    }

    public function getBodyHtmlAttribute()
    {
        return \Markdown::text($this->body);
    }
}
