@extends('layouts.app')
@section('head')
    <title>{{ config('app.account', 'SiteName') }}</title>
    {{--<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />--}}
@endsection
@section('content')

    <Account
        Url-Get-User="{{route('Get.Users')}}"
        Url-Get-Order="{{route('Get.Orders')}}"
        Url-Get-State="{{route('Get.State')}}"
        Url-Address="{{route('Address')}}"
        Index="{{$Index}}"
    ></Account>

@endsection
