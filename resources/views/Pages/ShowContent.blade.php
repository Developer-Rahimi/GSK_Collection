@extends('layouts.app')

@section('content')
    <div class="container">
        <Show-Content
            Url-Get-Content="{{route('Get.Content')}}"
            Index="{{$id}}"
        ></Show-Content>
        {{$id}}
    </div>
@endsection
