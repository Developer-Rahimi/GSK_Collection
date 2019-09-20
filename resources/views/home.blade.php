@extends('layouts.app')

@section('content')
<div>
    <Home
            Url-Get-Product="{{route('Get.Product')}}"
    ></Home>
</div>
@endsection
