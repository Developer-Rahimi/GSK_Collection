@extends('Admin.app')

@section('content')
    <div>
        <Admin
                Url-Statistics="{{route('Admin.api.Statistics')}}"
        ></Admin>
    </div>
@endsection
