<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    public function index()
    {
        $events = \DB::select('select * from events', [1]);

        return view('events', ['events' => $events]);
    }

    public function show($event_id)
    {
        $event = \DB::table('events')->where('event_id', $event_id)->first();

        dd($event);

        return view('event', [
            'event' => $event
        ]);
    }
}
