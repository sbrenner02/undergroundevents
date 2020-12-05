<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Event;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index()
    {
        //Get All events that have not happened yet
        $events = Event::whereDate('start_date', '>=', date('Y-m-d'))->orderBy('created_at', 'desc')->paginate(10);

        //If the poster is empty, apply the default
        foreach($events as $event){
            if (! $event->poster){
                $event->poster = '/noposter.jpg';
            }
        }

        return view('events.events', ['events' => $events]);
    }

    public function today()
    {
        //Get all events that occur today
        $events = Event::whereDate('start_date', '=', date('Y-m-d'))->orderBy('created_at', 'desc')->paginate(10);

        //If the poster is empty, apply the default
        foreach($events as $event){
            if (! $event->poster){
                $event->poster = '/noposter.jpg';
            }
        }

        return view('events.todayevents', ['events' => $events]);
    }

    public function show(Event $event)
    {

        $user_id = Auth::id();

        //Get event details or display default data if the field is empty
        if (! $event->address){
            $event->address = 'Not Specified';
        }

        if (! $event->artist){
            $event->artist = 'Not Specified';
        }

        if (! $event->website){
            $event->website = 'Not Specified';
        }

        if (! $event->facebook){
            $event->facebook = 'Not Specified';
        }

        if (! $event->twitter){
            $event->twitter = 'Not Specified';
        }

        if (! $event->instagram){
            $event->instagram = 'Not Specified';
        }

        if (! $event->tickets){
            $event->tickets = 'Not Specified';
        }

        if (! $event->price){
            $event->price = 'Not Specified';
        }

        if (! $event->poster){
            $event->poster = '/noposter.jpg';
        }

        return view('events.event', [
            'event' => $event,
            'user_id' => $user_id
        ]);
    }

    public function add(){
        return view('events.add');
    }

    protected function storeImage(Request $request) {
        //Get the image from the post request
        $file = $request->file('poster');
        $extension = $file->getClientOriginalExtension();
        //Set the path and save the poster
        $path = $request->file('poster')->storeAs('public/posters', $request->event_id.'.'.$extension);
        return substr($path, strlen('public/posters'));
    }

    public function store(Request $request){

        //Validate the data
        request()->validate([
           'name' => 'required',
           'type' => 'required',
           'start_date' => 'required',
           'time' => 'required',
           'host' => 'required',
           'location' => 'required',
           'price' => 'required',
           'poster' => 'image|mimes:jpeg,png,jpg|max:5000'
        ]);

        $event = new Event();

        $id = Auth::id();
        //Get the event data
        $event->name = request('name');
        $event->description = request('description');
        $event->type = request('type');
        $event->start_date = request('start_date');
        $event->end_date = request('end_date');
        $event->time = request('time');
        $event->host_id = $id;
        $event->host = request('host');
        $event->location = request('location');
        $event->address = request('address');
        $event->price = request('price');
        $event->agelimit = request('agelimit');
        $event->tickets = request('tickets');
        $event->website = request('website');
        $event->facebook = request('facebook');
        $event->twitter = request('twitter');
        $event->instagram = request('instagram');

        //Save the poster if it was provided
        if ($request->hasFile('poster'))
        {
            if ($request->file('poster')->isValid())
            {
                $file = $request->file('poster');
                $extension = $file->getClientOriginalExtension();
                $path = $request->file('poster')->storePubliclyAs('public/', $event->event_id.'.'.$extension);
                $posterUrl = substr($path, strlen('public/'));
                $event->poster = $posterUrl;
            }
        }

        $event->save();

        return redirect('/events/'. $event->event_id)->with('message', 'Your event has been created!');
    }

    public function edit(Event $event) {

        return view('events.edit', ['event' => $event]);
    }

    public function update(Event $event, Request $request){

        request()->validate([
            'name' => 'required',
            'type' => 'required',
            'start_date' => 'required',
            'time' => 'required',
            'host' => 'required',
            'location' => 'required',
            'price' => 'required',
            'poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $event->name = request('name');
        $event->description = request('description');
        $event->type = request('type');
        $event->start_date = request('start_date');
        $event->end_date = request('end_date');
        $event->time = request('time');
        $event->host = request('host');
        $event->location = request('location');
        $event->address = request('address');
        $event->price = request('price');
        $event->agelimit = request('agelimit');
        $event->tickets = request('tickets');
        $event->website = request('website');
        $event->facebook = request('facebook');
        $event->twitter = request('twitter');
        $event->instagram = request('instagram');
        $event->status = request('status');

        if ($request->hasFile('poster'))
        {
            if ($request->file('poster')->isValid())
            {
                $file = $request->file('poster');
                $extension = $file->getClientOriginalExtension();
                $path = $request->file('poster')->storePubliclyAs('public/', $event->event_id.'.'.$extension);
                $posterUrl = substr($path, strlen('public/'));
                $event->poster = $posterUrl;
            }
        }

        $event->save();

        return redirect('/events/' . $event->event_id)->with('message', 'Event Successfully Updated');
    }

    public function myEvents()
    {
        //A list of events owned by the current user
        $events = Event::where('host_id', Auth::id())->paginate(10);

        foreach($events as $event){
            if (! $event->poster){
                $event->poster = '/noposter.jpg';
            }
        }

        return view('events.myevents', ['events' => $events]);
    }
}
