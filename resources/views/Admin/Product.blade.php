@extends('Admin.app')

@section('content')

    <Products
            Url-Get-Product="{{route('Admin.api.GetProduct')}}"
            Url-Send-Product="{{route('Admin.api.SendProduct')}}"
            Url-Get-Category="{{route('Get.Category')}}"
    ></Products>
@endsection