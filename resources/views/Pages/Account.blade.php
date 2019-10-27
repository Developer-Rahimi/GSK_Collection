@extends('layouts.app')

@section('content')

    <Account
        Url-Get-User="{{route('Get.Users')}}"
        Url-Get-Order="{{route('Get.Orders')}}"
        Index="{{$Index}}"
    ></Account>
@endsection
