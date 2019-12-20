@extends('layouts.app')
@section('head')
    <title>{{ config('app.cart', 'SiteName') }}</title>
@endsection
@section('content')
    <Cart
        User="{{$User}}"
        Url-Get-Cart="{{route('Get.Cart')}}"
        Url-Get-Address="{{route('Address')}}"
        Url-Send-Pay="{{route('Send.Pay')}}"
    ></Cart>
@endsection
