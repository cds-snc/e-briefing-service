<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Article extends Model implements Sortable
{
    protected $guarded = [];

    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'sort_id',
        'sort_when_creating' => true,
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }
}
