<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
Route::resource('trips', 'TripController');

Route::resource('days', 'DayController', ['only' => [
    'edit', 'update', 'destroy'
]]);

Route::resource('trips.days', 'TripDaysController');
Route::resource('days.events', 'DayEventsController');