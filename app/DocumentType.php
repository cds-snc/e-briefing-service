<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $guarded = [];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
