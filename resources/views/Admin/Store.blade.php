@extends('Admin.app')

@section('content')
    <div>
        <Store
                Url-Get-Product="{{route('Admin.api.GetProduct')}}"
                Url-Get-Store="{{route('Admin.api.GetStore')}}"
        ></Store>
    </div>
@endsection