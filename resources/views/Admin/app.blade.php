<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/ico" href="{{ asset('icon/favicon.ico') }}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Admin.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <Admin-Master
            Url-Admin="{{route('Admin')}}"
    >
        <main class="py-4">
            @yield('content')
        </main>
    </Admin-Master>

</div>
{{--<link href="{{ asset('Style.css') }}" rel="stylesheet">--}}

</body>
</html>
