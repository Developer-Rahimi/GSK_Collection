@extends('layouts.app')

@section('content')
<div>
    <Home
            Url-Get-Content="{{route('Get.Content')}}"
    ></Home>
</div>
@endsection
