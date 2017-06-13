<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $guarded = [];

    public function people()
    {
        return $this->hasMany(Person::class);
    }

    public function days()
    {
        return $this->hasMany(Day::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
