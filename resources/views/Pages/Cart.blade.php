@extends('layouts.app')
@section('head')
    <title>{{ config('app.cart', 'SiteName') }}</title>
@endsection
@section('content')
    <Cart
        Url-Get-Cart="{{route('Get.Cart')}}"
        Url-Send-Pay="{{route('Send.Pay')}}"
    ></Cart>
@endsection
