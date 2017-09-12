<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\PdfToImage\Pdf;

class Document extends Model implements Sortable
{
    protected $guarded = [];
    protected $touches = ['trip'];

    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'sort_id',
        'sort_when_creating' => true,
    ];

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

    public function getPreviewImageAttribute()
    {
        return null;
        /*
        if (!extension_loaded('imagick')) {
            dd(phpinfo());
            throw new \Exception('imagick not installed');
        }

        if ($this->file) {
            if (Storage::exists($this->file)) {
                if (!Storage::exists($this->file . '.png')) {
                    $pdf = new Pdf($this->file);
                    $pdf->saveImage($this->file . '.png');
                    return $this->file . '.png';
                }
                return $this->file . '.png';
            }
        }
        return null;
        */
    }
}
