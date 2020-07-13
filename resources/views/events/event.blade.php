@extends('layout')
@section('content')
    <div class="col-12 row no-gutters">
        <div class="col-lg-8 col-sm-12">
        <table class="table">
            <tr>
                <td nowrap>Event Name</td><td>{{ $event->name }}</td>
            </tr>
            <tr>
                <td nowrap>Type of Event</td><td>{{ ucfirst($event->type) }}</td>
            </tr>
            <tr>
                <td nowrap>Start Time</td><td>{{ date('h:i a', strtotime($event->time)) }}</td>
            </tr>
            <tr>
                <td nowrap>Dates</td><td>{{ date('d-m-Y', strtotime($event->start_date)) }} @if($event->end_date)- {{ date('d-m-Y', strtotime($event->end_date)) }}@endif</td>
            </tr>
            <tr>
                <td nowrap>Host</td><td>{{ $event->host }}</td>
            </tr>
            <tr>
                <td nowrap>Location</td><td>{{ $event->location }}</td>
            </tr>
            <tr>
                <td nowrap>Address</td><td>{{ $event->address }}</td>
            </tr>
            <tr>
                <td nowrap>Price</td><td>{{ $event->price }}</td>
            </tr>
            <tr>
                <td nowrap>Tickets</td><td>{{ $event->tickets }}</td>
            </tr>
            <tr>
                <td nowrap>Website</td><td>{{ $event->website }}</td>
            </tr>
            <tr>
                <td nowrap>Facebook Page</td><td>{{ $event->facebook }}</td>
            </tr>
            <tr>
                <td nowrap>Twitter</td><td>{{ $event->twitter }}</td>
            </tr>
            <tr>
                <td nowrap>Instagram</td><td>{{ $event->instagram }}</td>
            </tr>
            <tr>
                <td nowrap>Age Limit</td><td>{{ $event->agelimit }}</td>
            </tr>
            <tr>
                <td nowrap>Description</td><td>{!! nl2br(e($event->description))!!}}</td>
            </tr>
        </table>
        </div>
        <div class="col-lg-4 col-sm-12 order-sm-1">
            <div class="align-top">
            <img class="w-100" src="{{asset('/storage'.$event->poster)}}">
            </div>
        </div>
    </div>
    @if($user_id == $event->host_id)
    <div class="text-center my-4">
        <a href="/events/{{ $event->event_id }}/edit"><button class="btn btn-outline-light">Edit Event</button></a>
    </div>
        @endif
@endsection
