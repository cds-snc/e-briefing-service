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

Route::resource('trips.people', 'TripPeopleController');
Route::resource('trips.days', 'TripDaysController');
Route::resource('trips.articles', 'TripArticlesController');
Route::resource('trips.documents', 'TripDocumentsController');

Route::resource('days.events', 'DayEventsController');

Route::resource('events', 'EventController', ['only' => [
    'show', 'edit', 'update', 'destroy'
]]);

Route::post('events/{event}/participants', ['as' => 'events.participants.add', 'uses' => 'EventParticipantsController@add']);
Route::get('events/{event}/participants/create', ['as' => 'events.participants.create', 'uses' => 'EventParticipantsController@create']);
Route::post('events/{event}/participants', ['as' => 'events.participants.store', 'uses' => 'EventParticipantsController@store']);

Route::post('events/{event}/contacts', ['as' => 'events.contacts.add', 'uses' => 'EventContactsController@add']);
Route::get('events/{event}/contacts/create', ['as' => 'events.contacts.create', 'uses' => 'EventContactsController@create']);
Route::post('events/{event}/contacts', ['as' => 'events.contacts.store', 'uses' => 'EventContactsController@store']);