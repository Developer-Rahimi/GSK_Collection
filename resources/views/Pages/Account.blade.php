@extends('layouts.app')
@section('head')
    <title>{{ config('app.account', 'SiteName') }}</title>
@endsection
@section('content')

    <Account
        Url-Get-User="{{route('Get.Users')}}"
        Url-Get-Order="{{route('Get.Orders')}}"
        Index="{{$Index}}"
    ></Account>
@endsection
