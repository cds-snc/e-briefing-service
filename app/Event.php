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

    public function participants()
    {
        return $this->belongsToMany(Person::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(Person::class)->where('pivot.is_contact', 1);
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }
}
