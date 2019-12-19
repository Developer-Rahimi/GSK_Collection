@extends('Admin.app')

@section('content')
    <div>

        <Contact
            User-Info="{{$User}}"
            Url-Get-Contact="{{route('Admin.api.GetContact')}}"
         ></Contact>
    </div>
@endsection
