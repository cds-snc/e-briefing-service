<?php

namespace App\Http\Controllers\Api;

use App\Trip;
use App\TripPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DownloadTripPackageController extends Controller
{
    protected $storage_path;
    private $package;

    public function __construct(TripPackage $package)
    {
        $this->package = $package;
    }

    public function __invoke(Trip $trip)
    {
        ini_set('max_execution_time', 60);

        $package = $this->package->generate($trip);

        /*
        $this->storage_path = 'public/packages/trips/' . $trip->id;

        if (!Storage::exists($this->storage_path . '/package.zip')) {
            return response()->json([
                'error' => true,
                'message' => 'There is no package available for this trip'
            ], 404);
        }
        */

        return response()->download($package);
    }
}
