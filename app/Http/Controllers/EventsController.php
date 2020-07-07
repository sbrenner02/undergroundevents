<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Event;
use App\Exceptions\Handler;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::take(10)->latest()->get();

        return view('events.events', ['events' => $events]);
    }

    public function show(Event $event)
    {

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
            $event->price= 'Not Specified';
        }

        return view('events.event', [
            'event' => $event
        ]);
    }

    public function add(){
        return view('events.add');
    }

    protected function storeImage(Request $request) {
        $file = $request->file('poster');
        $extension = $file->getClientOriginalExtension();
        $path = $request->file('poster')->storeAs('public/posters', $request->event_id.'.'.$extension);
        return substr($path, strlen('public/posters'));
    }

    public function store(Request $request){

        request()->validate([
           'name' => 'required',
           'type' => 'required',
           'date' => 'required',
           'time' => 'required',
           'host' => 'required',
           'location' => 'required',
           'price' => 'required',
           'poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $event = new Event();

        $event->name = request('name');
        $event->description = request('description');
        $event->type = request('type');
        $event->date = request('date');
        $event->time = request('time');
        // $event->created_by_id = request('created_by_id') TODO host_id once users exist
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
            'date' => 'required',
            'time' => 'required',
            'host' => 'required',
            'location' => 'required',
            'price' => 'required',
            'poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $event->name = request('name');
        $event->description = request('description');
        $event->type = request('type');
        $event->date = request('date');
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
}
