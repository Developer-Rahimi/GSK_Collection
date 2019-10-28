@extends('layouts.app')
@section('head')
    <title>{{ config('app.login', 'SiteName') }}</title>
@endsection
@section('content')
    <div class="container">
        <Login
            Url-Login="{{route('User.Login')}}"
            Url-Check-Email="{{route('User.CheckEmail')}}"
            Url-Check-Register="{{route('User.Register')}}"
        ></Login>
    </div>

@endsection

