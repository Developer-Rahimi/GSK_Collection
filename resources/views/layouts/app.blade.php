<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="shortcut icon" type="image/ico" href="{{ asset('icon/favicon.ico') }}"/>
    <!-- Fonts -->
{{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('Map/leaflet.js') }}" ></script>
    <link href="{{ asset('Map/Map.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>--}}
    @yield('head')
</head>
<body>
<div id="app">
    <Master
            User-Info="{{$User}}"
            Home="{{route('Home')}}">
        <main class="py-4">
            @yield('content')
        </main>
    </Master>

</div>
<link href="{{ asset('css/Style.css') }}" rel="stylesheet">
@yield('footer')
</body>
</html>
