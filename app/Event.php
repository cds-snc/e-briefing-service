<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function getTripAttribute()
    {
        return $this->day->trip;
    }

    public function getAvailableContactsAttribute()
    {
        return $this->trip->people->whereNotIn('id', $this->contacts->pluck('id'));
    }

    public function getAvailableParticipantsAttribute()
    {
        return $this->trip->people->whereNotIn('id', $this->participants->pluck('id'));
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
}
