<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Air Map - @yield('title')</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-left links">
        <a href="{{ url('/home') }}">Air Map</a>
    </div>

    <div class="top-right links">
        @if (session('user'))
            <a href="{{ url('/home') }}">
                {{--                {{ session('user')->getName() }}--}}
                <img class="avatar" src="{{ session('user')->avatar }}"/>

            </a>
            &middot;
            <a href="{{ url('/logout') }}">
                Logout
            </a>
        @else
            <a href="{{ url('login/github') }}">Login via GitHub</a>
        @endauth
    </div>

    <div class="content">
        @yield('content')
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
