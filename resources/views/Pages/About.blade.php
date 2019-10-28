@extends('layouts.app')
@section('head')
    <title>{{ config('app.about', 'SiteName') }}</title>
@endsection
@section('content')
    <div class="container">
       <About></About>
    </div>
@endsection
