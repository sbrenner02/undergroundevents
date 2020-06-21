@extends('layout')
@section('content')
<div class="row">
    <div class="col-1 leftside">This is Sidebar / Images / Ads</div>
    <div class="col-8 content">
        <h2 class="text-center">Submit an Event</h2>
        <div class="row pt-3">
            <div class="col-6">
                <table class="col-12">
                    <form name="submit_event_form" id="submit_event_form" method="post">
                    <tr>
                        <td>
                    <tr>
                        <td>{{ $event->name }}</td><td><input type="text" class="custom-control w-100"></td>
                    </tr>
                    <tr>
                        <td>Type of Event</td><td><input type="text" class="custom-control w-100"></td>
                    </tr>
                    <tr>
                        <td>Start Time</td><td><input type="text" class="custom-control w-100"></td>
                    </tr>
                    <tr>
                        <td>Dates</td><td><input type="text" class="custom-control w-100"></td>
                    </tr>
                    <tr>
                        <td>Host</td><td><input type="text" class="custom-control w-100"></td>
                    </tr>
                    <tr>
                        <td>Status</td><td><input type="text" class="custom-control w-100"></td>
                    </tr>
                    <tr>
                        <td>Location</td><td><input type="text" class="custom-control w-100"></td>
                    </tr>
                    <tr>
                        <td>Address</td><td><input type="text" class="custom-control w-100"></td>
                    </tr>
                    <tr>
                        <td>Artist / Performers</td><td><input type="text" class="custom-control w-100"></td>
                    </tr>
                    <tr>
                        <td>Website</td><td><input type="text" class="custom-control w-100"></td>
                    </tr>
                    <tr>
                        <td>Price</td><td><input type="text" class="custom-control w-100"></td>
                    </tr>
                    <tr>
                        <td>Age Limit</td><td><input type="text" class="custom-control w-100"></td>
                    </tr>
                    <tr>
                        <td>Description</td><td><input type="text" class="custom-control w-100"></td>
                    </tr>
                    <tr>
                        <td>Poster / Event Image</td><td><button class="btn btn-light">Upload</button></td>
                    </tr>
                        <tr>
                            <td colspan="3" class="pt-4"><button class="btn btn-outline-light">Submit</button></td>
                        </tr>
                    </form>
                </table></div>
            <div class="col-4 align-top pl-4">Poster Image After Upload</div>
        </div>
    </div>
    <div class="col-2 rightsde">This is a calendar to click on</div>
</div>
@endsection
