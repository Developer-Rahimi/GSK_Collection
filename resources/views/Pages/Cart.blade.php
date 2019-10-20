@extends('layouts.app')

@section('content')
    <Cart
        Url-Get-Cart="{{route('Get.Cart')}}"
        Url-Send-Pay="{{route('Send.Pay')}}"
    ></Cart>
@endsection
