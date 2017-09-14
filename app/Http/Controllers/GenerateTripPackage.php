<?php

namespace App\Http\Controllers;

use App\Article;
use App\Day;
use App\Document;
use App\Event;
use App\PackageGenerator;
use App\Person;
use App\Trip;
use Carbon\Carbon;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Support\Facades\Storage;

class GenerateTripPackage extends Controller
{
    /**
     * @var PackageGenerator
     */
    private $package;

    public function __construct(PackageGenerator $package)
    {
        $this->package = $package;
    }

    public function __invoke(Trip $trip)
    {
        ini_set('max_execution_time', 60);

        $this->package->generate($trip);

        return redirect()->back()->with('success', 'Package Generated.  You can now sync the data to device by using the link in the app.');
    }
}
