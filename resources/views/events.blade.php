@extends('layout')
@section('content')
@foreach($events as $event)
    <div class="col-12">
        <table class="table">
            <tr>
                <td>Event Name</td><td>{{ $event->name }}</td>
            </tr>
            <tr>
                <td>Type of Event</td><td>{{ $event->type }}</td>
            </tr>
            <tr>
                <td>Start Time</td><td>START TIME</td>
            </tr>
            <tr>
                <td>Dates</td><td>DATES</td>
            </tr>
            <tr>
                <td>Host</td><td>PERSON</td>
            </tr>
            <tr>
                <td>Status</td><td>STATUS</td>
            </tr>
            <tr>
                <td>Location</td><td>LOCATION</td>
            </tr>
            <tr>
                <td>Address</td><td>123 FAKE STREET, BALTIMORE, MD 21214</td>
            </tr>
            <tr>
                <td>Artist / Performers</td><td>A BUNCH OF PEOPLE</td>
            </tr>
            <tr>
                <td>Website</td><td>WWW.EVENTPAGE.COM/EVENT</td>
            </tr>
            <tr>
                <td>Price</td><td>DOLLARS</td>
            </tr>
            <tr>
                <td>Age Limit</td><td>RESTRICTIONS</td>
            </tr>
            <tr>
                <td>Description</td><td>{{ $event->description }}</td>
            </tr>
        </table>
        <div class="align-top">Poster</div>
    </div>
    <hr>
@endforeach
@endsection
