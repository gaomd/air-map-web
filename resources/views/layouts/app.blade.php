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
        Air Map
    </div>

    <div class="top-right links">
        @if (session('user'))
            <a href="{{ url('/home') }}">
                {{ session('user')->getName() }}
                <img class="avatar" src="{{ session('user')->avatar }}"/>
            </a>
        @else
            <a href="{{ url('login/github') }}">Login with GitHub</a>
        @endauth
    </div>

    <div class="content">
        @yield('content')
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
  var map = new google.maps.Map(document.getElementById('map'), {
    center: new google.maps.LatLng(35.4896589, 118.321531),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoom: 6
  });

  var t = new Date().getTime();
  var waqiMapOverlay = new google.maps.ImageMapType({
    getTileUrl: function (coord, zoom) {
      return 'https://tiles.waqi.info/tiles/usepa-aqi/' + zoom + "/" + coord.x + "/" + coord.y + ".png?token={{ env('AQICN_TOKEN') }}";
    },
    name: "Air  Quality",
  });

  map.overlayMapTypes.insertAt(0, waqiMapOverlay);
</script>
</body>
</html>
