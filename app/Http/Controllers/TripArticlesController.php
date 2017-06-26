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
        $trip->articles()->create([
            'title' => $request->title,
            'body' => $request->body,
            'is_protected' => $request->has('is_protected')
        ]);

        return redirect()->route('trips.articles.index', $trip)->with('success', 'Article saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Trip $trip
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip, Article $article)
    {
        return view('trips.articles.edit', [
            'trip' => $trip,
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Trip $trip
     * @param Article $article
     * @param StoreArticle|Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Trip $trip, Article $article, StoreArticle $request)
    {
        $article->update([
            'title' => $request->title,
            'body' => $request->body,
            'is_protected' => $request->has('is_protected')
        ]);

        return redirect()->route('trips.articles.index', $trip)->with('success', 'Article saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip, Article $article)
    {
        $article->delete();

        return redirect()->back()->with('success', 'Article deleted');
    }
}
