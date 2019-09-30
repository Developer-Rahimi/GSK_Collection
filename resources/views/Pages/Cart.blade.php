@extends('layouts.app')

@section('content')
    <Cart
        Url-Get-Cart="{{route('Get.Cart')}}"
    ></Cart>
@endsection
