@extends('layout')
@section('content')
@foreach($events as $event)
    <div class="col-12 row py-4">
        <div class="col-lg-7 col-sm-12 row no-gutters border-color">
            <div class="col-12 row no-gutters justify-content-between p-2">
                <div>
                    <h2>{{ $event->name }}</h2>
                </div>
                <div>
                    {{ $event->time }}
                </div>
                <div>
                    {{ $event->date }}
                </div>
            </div>
            <div class="col-12 row no-gutters justify-content-between p-2">
                <div>
                    {{ $event->location }}
                </div>
                <div>
                    {{ $event->artist }}
                </div>
            </div>
            <div class="col-12 row no-gutters py-3 no-gutters p-2">
                <div class="col-12 py-3">
                        {{ $event->description }}
                </div>
                <div class="col-11">
                        {{ $event->price }} {{ $event->tickets }}
                </div>
                <div class="col-1 float-right">
                    <a href="/events/{{ $event->event_id }}"><button class="btn btn-outline-light">Details</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 order-sm-1 border-color">
            <div class="align-top">
                [Poster]
                {{ $event->poster }}
            </div>
        </div>
    </div>
@endforeach
@endsection
