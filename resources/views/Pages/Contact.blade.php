@extends('layouts.app')
@section('head')
    <title>{{ config('app.contact', 'SiteName') }}</title>
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="contact/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="contact/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="contact/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="contact/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="contact/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="contact/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="contact/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="contact/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="contact/css/util.css">
    <link rel="stylesheet" type="text/css" href="contact/css/main.css">
    <!--===============================================================================================-->
@endsection
@section('content')
    <div class="container">
       <Contact
               Url-Get-Contact="{{route('Get.Contact')}}"
               Url-Send-Contact="{{route('Send.Contact')}}"
       ></Contact>
    </div>
@endsection
@section('footer')
    <!--===============================================================================================-->
    <script src="contact/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="contact/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="contact/vendor/bootstrap/js/popper.js"></script>
    <script src="contact/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="contact/vendor/select2/select2.min.js"></script>
    <script>
        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <!--===============================================================================================-->
    <script src="contact/vendor/daterangepicker/moment.min.js"></script>
    <script src="contact/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="contact/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="contact/js/main.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
@endsection
