@extends('layouts.app')

@section('content')
    <div class="container">
        <Login
            Url-Login="{{route('User.Login')}}"
            Url-Check-Email="{{route('User.CheckEmail')}}"
            Url-Check-Register="{{route('User.Register')}}"
        ></Login>
    </div>

@endsection

