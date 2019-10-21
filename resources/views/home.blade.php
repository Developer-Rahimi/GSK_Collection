@extends('layouts.app')

@section('content')
<div>
    {{$User}}{{$Login}}
    <Home
            Url-Get-Content="{{route('Get.Content')}}"
    ></Home>
</div>
@endsection
