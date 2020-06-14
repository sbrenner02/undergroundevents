<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/style.css" type="text/css" rel="stylesheet">
    <title>Underground Events</title>
</head>
<body>
@include('header')
<div class="no-gutters justify-content-center content">
    <div class="row justify-content-center col-12 no-gutters">
        <div class="col-2 text-center"></div>
        <div class="col-8">
            @yield('content')
        </div>
        <div class="col-2 text-center"></div>

    </div>
</div>
@include('footer')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
