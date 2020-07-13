@extends('layout')
@section('content')
    <h1 class="text-center">Submit an Event</h1>
    @auth
    <div class="col-12 row">
        <div class="col-12">
            <form name="submitevent" enctype="multipart/form-data" method="post" action="/events/addevent">
                @csrf
            <table class="table">
                <tr>
                    <td nowrap>Event Name @error('name')<p class="alert-danger">{{ $errors->first('name') }}</p>@enderror</td><td><input type="text" name="name" class="form-control" required></td>
                </tr>
                <tr>
                    <td nowrap>Type of Event</td>
                    <td>
                        <select class="form-control" name="type" required>
                            <option value="concert">Concert</option>
                            <option value="livestream">Live Stream</option>
                            <option value="exhibit">Exhibit</option>
                            <option value="festival">Festival</option>
                            <option value="communityevent">Community Event</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td nowrap>Start Time</td><td><input type="time" name="time" class="form-control" required></td>
                </tr>
                <tr>
                    <td nowrap>Start Date</td><td><input type="date" name="start_date" class="form-control" required></td>
                </tr>
                <tr>
                    <td nowrap>End Date (if multi-day)</td><td><input type="date" name="end_date" class="form-control"></td>
                </tr>
                <tr>
                    <td nowrap>Host</td><td><input type="text" name="host" class="form-control" required></td>
                </tr>
                <tr>
                    <td nowrap>Location</td><td><input type="text" name="location" class="form-control" required></td>
                </tr>
                <tr>
                    <td nowrap>Address</td><td><input type="text" name="address" class="form-control"></td>
                </tr>
                <tr>
                    <td nowrap>Price</td><td><input type="text" name="price" class="form-control" required></td>
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
                    <td nowrap>Tickets</td><td><input type="text" name="tickets" class="form-control"></td>
                </tr>
                <tr>
                    <td nowrap>Website</td><td><input type="text" name="website" class="form-control"></td>
                </tr>
                <tr>
                    <td nowrap>Facebook Page</td><td><input type="text" name="facebook" class="form-control"></td>
                </tr>
                <tr>
                    <td nowrap>Twitter</td><td><input type="text" name="twitter" class="form-control"></td>
                </tr>
                <tr>
                    <td nowrap>Instagram</td><td><input type="text" name="instagram" class="form-control"></td>
                </tr>
                <tr>
                    <td nowrap>Poster</td><td><input type="file" name="poster" class="form-control"></td>
                </tr>
                <tr>
                    <td nowrap>Description</td><td><textarea class="form-control" name="description" rows="20" required></textarea></td>
                </tr>
            </table>
                <div class="col-12 text-center justify-content-center"><button class="btn btn-outline-light">Submit Event</button></div>
            </form>
        </div>
    </div>
    @endauth
    @guest
        <div class="text-center py-5">
            You must be <a href="/login">logged in</a> to submit an event
        </div>
    @endguest
@endsection
