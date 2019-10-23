@extends('Admin.app')

@section('content')
    <div>
        <Contents
            Url-Get-Content="{{route('Admin.api.Contents')}}"
        ></Contents>
    </div>
@endsection
