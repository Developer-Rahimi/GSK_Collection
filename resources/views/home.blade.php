@extends('layouts.app')

@section('content')
<div class="container">
    <Home
            Url-Get-Product="{{route('Get.Product')}}"
    ></Home>
</div>
@endsection
