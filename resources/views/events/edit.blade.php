@extends('layout')
@section('content')
    <h1 class="text-center">Edit Event</h1>
    <div class="col-12 row">
        <div class="col-lg-10 col-sm-12">
            <form name="updateevent" enctype="multipart/form-data" method="POST" action="/events/{{ $event->event_id }}">
                @csrf
                @method('PUT')
                <table class="table">
                    <tr>
                        <td nowrap>Event Name</td><td><input type="text" name="name" class="form-control" value="{{ $event->name }}"></td>
                    </tr>
                    <tr>
                        <td nowrap>Type of Event</td>
                        <td>
                            <select class="form-control" name="type">
                                <option value="concert">Concert</option>
                                <option value="livestream">Live Stream</option>
                                <option value="exhibit">Exhibit</option>
                                <option value="festival">Festival</option>
                                <option value="communityevent">Community Event</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td nowrap>Start Time</td><td><input type="time" name="time" class="form-control" value="{{ $event->time }}"></td>
                    </tr>
                    <tr>
                        <td nowrap>Date</td><td><input type="date" name="date" class="form-control" value="{{ $event->date }}"></td>
                    </tr>
                    <tr>
                        <td nowrap>Host</td><td><input type="text" name="host" class="form-control" value="{{ $event->host }}"></td>
                    </tr>
                    <tr>
                        <td nowrap>Location</td><td><input type="text" name="location" class="form-control" value="{{ $event->location }}"></td>
                    </tr>
                    <tr>
                        <td nowrap>Address</td><td><input type="text" name="address" class="form-control" value="{{ $event->address }}"></td>
                    </tr>
                    <tr>
                        <td nowrap>Price</td><td><input type="text" name="price" class="form-control" value="{{ $event->price }}"></td>
                    </tr>
                    <tr>
                        <td nowrap>Age Limit</td>
                        <td>
                            <select class="form-control" name="agelimit">
                                <option value="none" selected>None</option>
                                <option value="18+">18+</option>
                                <option value="21+">21+</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td nowrap>Tickets</td><td><input type="text" name="tickets" class="form-control" value="{{ $event->tickets }}"></td>
                    </tr>
                    <tr>
                        <td nowrap>Website</td><td><input type="text" name="website" class="form-control" value="{{ $event->website }}"></td>
                    </tr>
                    <tr>
                        <td nowrap>Facebook Page</td><td><input type="text" name="facebook" class="form-control" value="{{ $event->facebook }}"></td>
                    </tr>
                    <tr>
                        <td nowrap>Twitter</td><td><input type="text" name="twitter" class="form-control" value="{{ $event->twitter }}"></td>
                    </tr>
                    <tr>
                        <td nowrap>Instagram</td><td><input type="text" name="instagram" class="form-control" value="{{ $event->instagram }}"></td>
                    </tr>
                    <tr>
                        <td nowrap>Poster</td><td><input type="file" name="poster" class="form-control"></td>
                    </tr>
                    <tr>
                        <td nowrap>Status</td>
                        <td>
                            <select class="form-control" name="status">
                                <option value="active" selected>Active</option>
                                <option value="postponed">Postponed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td nowrap>Description</td><td><textarea class="form-control" rows="20" name="description">{{ $event->description }}</textarea></td>
                    </tr>
                </table>
                <div class="col-12 text-center justify-content-center"><button class="btn btn-outline-light">Update Event</button></div>
            </form>
        </div>
    </div>
@endsection
