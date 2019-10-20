@extends('layouts.app')

@section('content')
    <div class="container">
        <Show-Content
            Url-Get-Content="{{route('Get.Content')}}"
            Url-Send-Comment="{{route('Send.Comment')}}"
            Url-Send-Cart="{{route('Send.Cart')}}"
            Index="{{$id}}"
        ></Show-Content>
        {{$id}}
    </div>
@endsection
