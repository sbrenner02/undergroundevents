<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'EventsController@index');
Route::get('/addevent', function () {
    return view('events.add');
});
Route::get('/users', function () {
    return view('users');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/myevents', function (){
   return view('events.myevents');
});
Route::get('/events', 'EventsController@index');
Route::get('/events/{event}', 'EventsController@show');
Route::get('/events/{event}/edit', 'EventsController@edit');
Route::post('/events/addevent', 'EventsController@store');
Route::put('/events/{event}', 'EventsController@update');


Auth::routes();

Route::get('/home', 'EventsController@index')->name('home');
