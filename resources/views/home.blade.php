@extends('layouts.app')
@section('head')
    <title>{{ config('app.name', 'SiteName') }}</title>
@endsection
@section('content')
<div>
   {{-- {{$User}}{{$Login}}--}}
    <Home
            Url-Get-Content="{{route('Get.Content')}}"
    ></Home>
</div>
@endsection
