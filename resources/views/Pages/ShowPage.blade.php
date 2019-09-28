@extends('layouts.app')

@section('content')
    <div class="container">
        <Show-Page
            Url-Get-Product="{{route('Get.Product')}}"
        ></Show-Page>
    </div>
@endsection
