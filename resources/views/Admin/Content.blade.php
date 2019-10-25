@extends('Admin.app')

@section('content')
    <div>
        <Contents
            Url-Get-Content="{{route('Admin.api.Contents')}}"
            Url-Send-Tag="{{route('Admin.api.SendTag')}}"
        ></Contents>
    </div>
@endsection
