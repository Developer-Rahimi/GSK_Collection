@extends('layouts.app')
@section('head')
    <title>{{ config('app.contact', 'SiteName') }}</title>
@endsection
@section('content')
    <div class="container">
       <Contact
               Url-Get-Contact="{{route('Get.Contact')}}"
               Url-Send-Contact="{{route('Send.Contact')}}"
       ></Contact>
    </div>
@endsection
