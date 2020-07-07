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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/verify', function () {
    return view('auth.verify');
});

Route::get('/confirm', function () {
    return view('auth.passwords.confirm');
});

Route::get('/email', function () {
    return view('auth.passwords.email');
});

Route::get('/reset', function () {
    return view('auth.passwords.reset');
});

Route::get('/events', 'EventsController@index');
Route::get('/events/{event}', 'EventsController@show');
Route::get('/events/{event}/edit', 'EventsController@edit');
Route::post('/events/addevent', 'EventsController@add');
Route::put('/events/{event}', 'EventsController@update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
