@extends('Admin.app')

@section('content')
    <div>
        {{--<User
            Url-Get-User="{{route('Admin.api.Users')}}"
        ></User>--}}
        <Order
                UrlGetOrder="{{route('Admin.api.Order')}}"
        ></Order>
    </div>
@endsection
