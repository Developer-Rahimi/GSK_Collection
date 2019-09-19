@extends('layouts.app')

@section('content')
    <div class="container">
       <Contact
               Url-Get-Contact="{{route('Get.Contact')}}"
       ></Contact>
    </div>
@endsection
