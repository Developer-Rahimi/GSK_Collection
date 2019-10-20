@extends('layouts.app')

@section('content')

    <Account
        Url-Get-User="{{route('Get.Users')}}"
        Index="{{$Index}}"
    ></Account>
@endsection
