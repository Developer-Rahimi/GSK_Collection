@extends('Admin.app')

@section('content')
    <div>
        <User
            Url-Get-User="{{route('Admin.api.Users')}}"
        ></User>
    </div>
@endsection
