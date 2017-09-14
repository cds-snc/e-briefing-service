<?php

namespace App\Http\Controllers\Api;

use App\Trip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DownloadTripPackageController extends Controller
{
    protected $storage_path;

    public function __invoke(Trip $trip)
    {
        $this->storage_path = 'packages/trips/' . $trip->id;

        if (!Storage::exists($this->storage_path . '/package.zip')) {
            return response()->json([
                'error' => true,
                'message' => 'There is no package available for this trip'
            ], 404);
        }

        return response()->download(storage_path('app/' . $this->storage_path . '/package.zip'));
    }
}
