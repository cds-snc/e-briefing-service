<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
}
