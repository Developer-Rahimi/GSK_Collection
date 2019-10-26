@extends('Admin.app')

@section('content')
    <div>

        <Contents
            User-Info="{{$User}}"
            Url-Get-Content="{{route('Admin.api.Contents')}}"
            Url-Send-Tag="{{route('Admin.api.SendTag')}}"
            Url-Send-Specification="{{route('Admin.api.SendSpecification')}}"
            Url-Send-Introduction="{{route('Admin.api.SendIntroduction')}}"
            Url-Send-Iamge="{{route('Admin.api.SendIamge')}}"
        ></Contents>
    </div>
@endsection
