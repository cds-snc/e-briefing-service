<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/user', function() {
    return \App\Trip::with('days', 'days.events', 'days.events.documents', 'days.events.people', 'articles', 'people')->first();
});


Route::get('/lang/trans.js', function () {

    $trans_file = File::get(base_path('resources/lang/fr.json'));

    $json = json_decode($trans_file);

    $output = [
        'fr' => $json
    ];

    header('Content-Type: text/javascript');
    echo('window.i18n = ' . json_encode($output) . ';');
    exit();
    // return response()->json(json_decode($file));
});