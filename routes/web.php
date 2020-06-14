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

Route::get('/', function () {
    return view('index');
});

Route::get('/addevent', function () {
    return view('addevent');
});

Route::get('/users', function () {
    return view('users');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/events', 'EventsController@show');

/*
$event = array();
$events = array();

if(! array_key_exists($event, $events)){
    abort(404, 'Event Not Found');
}
*/
Route::get('/event/{event}', 'EventsController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
