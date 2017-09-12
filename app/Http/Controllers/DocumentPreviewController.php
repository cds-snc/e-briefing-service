<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentPreviewController extends Controller
{
    public function __invoke(Document $document)
    {
        // dd(storage_path('app/public/' . $document->file));
        $imagick = new \Imagick(storage_path('app/public/' . $document->file));

        // header('Content-Type: image/jpeg');
        // echo $imagick;
        dd("Huzzah");
    }
}
