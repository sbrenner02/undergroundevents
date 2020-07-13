@extends('layout')
@section('content')
@foreach($events as $event)
    <div class="col-12 row py-4">
        <div class="col-lg-8 col-sm-12 row no-gutters border-color">
            <div class="col-12 row no-gutters justify-content-between p-2">
                <div>
                    <h2>{{ $event->name }}</h2>
                </div>
                <div>
                    {{ date('h:i a', strtotime($event->time)) }}
                </div>
                <div>
                    {{ date('d-m-Y', strtotime($event->start_date)) }} @if($event->end_date)- {{ date('d-m-Y', strtotime($event->end_date)) }}@endif
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
                <div class="col-1 float-right my-auto">
                    <a href="/events/{{ $event->event_id }}"><button class="btn btn-outline-light mr-1">Details</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 order-sm-1 border-color align-top p-0">
                <img class="w-100" src="{{asset('/storage'.$event->poster)}}">
        </div>
    </div>
@endforeach
    {{ $events->links() }}
@endsection
