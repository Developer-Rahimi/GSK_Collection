@extends('layouts.app')

@section('content')
<div>
    {{$moosa}}
    <Home
            Url-Get-Content="{{route('Get.Content')}}"
    ></Home>
</div>
@endsection
