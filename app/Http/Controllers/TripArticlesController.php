<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\StoreArticle;
use App\Trip;
use Illuminate\Http\Request;

class TripArticlesController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function index(Trip $trip)
    {
        $this->authorize('manage', $trip);

        return view('trips.articles.index', [
            'trip' => $trip,
            'articles' => $trip->articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function create(Trip $trip)
    {
        $this->authorize('manage', $trip);

        return view('trips.articles.create', [
            'trip' => $trip,
            'article' => new Article()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Trip $trip
     * @param StoreArticle|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Trip $trip, StoreArticle $request)
    {
        $this->authorize('manage', $trip);
        
        $trip->articles()->create([
            'title' => $request->title,
            'body' => $request->body,
            'is_protected' => $request->has('is_protected')
        ]);

        return redirect()->route('trips.articles.index', $trip)->with('success', 'Article saved!');
    }
}
