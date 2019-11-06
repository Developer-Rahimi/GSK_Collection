@extends('layouts.app')
@section('head')
    <style>

        .Loading {
            height: 100%; /* 100% Full-height */
            width: 100%; /* 0 width - change this with JavaScript */
            display: block;
            position: fixed; /* Stay in place */
            z-index: 10000; /* Stay on top */
            top: 0; /* Stay at the top */
            left: 0;
            background-color: #000000cc; /* Black*/
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 60px; /* Place content 60px from the top */
            transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
        }



    </style>

@endsection
@section('content')
    <div class="container">
        <Test> </Test>

            <div class="Loading">
                <center>
                    <div style="width: 150px;margin-top: 200px">
                        <div class="loader" >

                            <div class="face">
                                <div class="circle"></div>
                            </div>
                            <div class="face">
                                <div class="circle"></div>
                            </div>
                        </div>
                    </div>
                </center>
            </div>

        <!-- Use any element to open the sidenav -->
        <span onclick="openNav()">open</span>

    </div>

@endsection
