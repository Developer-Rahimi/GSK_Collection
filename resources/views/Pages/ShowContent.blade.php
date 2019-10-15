@extends('layouts.app')

@section('content')
    <div class="container">
        <Show-Content
            Url-Get-Content="{{route('Get.Content')}}"
            Url-Send-Comment="{{route('Send.Comment')}}"
            Index="{{$id}}"
        ></Show-Content>
        {{$id}}
    </div>
@endsection
