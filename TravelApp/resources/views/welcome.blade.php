<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('includes.head')
        <title>Boise State University Travel App</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">


    </head>
    <header class="header-custom">
        <div class="logo">
                <img id="banner" src="/images/boisestate-leftalignedmark-orange.png">
        </div>
            @include('includes.header')
    </header>
    <body class="">
{{--            <div>--}}
{{--                <img src="{{URL('/images/bsu_logo.png')}}" alt="bsu logo" style="max-width: 400px; top: 0; left: 0; opacity: .3; background-position: center; position: ; z-index: 1;">--}}
{{--            </div>--}}
            <div class="container content spacing">

                <div class="row">
                    <div class="title">Boise State University</div>
                    <div class="title">Travel Processing App</div><br><br>
                </div>
                @auth
                    <div class="row">
                        <a href="{{ url('/authorization/') }}" class="col btn btn-primary btn-lg blue" type="button" id="newRequest">Submit a new travel request</a>
                    </div>
                @endauth
                @guest
                    <div class="row">
                        <a href="{{ url('/login') }}" class="col btn btn-primary btn-lg blue" type="button" id="newRequest">Submit a new travel request</a>
                    </div>
                @endguest
                <div class="row">
                    <button class="col btn btn-secondary btn-lg orange-inactive" type="button" id="seeTrips" data-toggle="modal" data-target="#TripModal">
                        See your trips
{{--                        <span class="tooltiptext">Here you will be able to see your previous and current trips, view itinerary, and other trip information</span>--}}
                    </button>
                </div>
                <div class="row">
                <button class="col btn btn-secondary btn-lg orange-inactive" type="button" id="reviewEdit" data-toggle="modal" data-target="#ReviewModal">
                    Review/Edit upcoming travel
                </button>
                </div>
                <div class="row">
                <button class="col btn btn-secondary btn-lg orange-inactive" type="button" id="enterInfo" data-toggle="modal" data-target="#ReportModal">
                    Enter info while traveling
                </button>
                </div>
                {{--                See Your Trips Modal--}}
                <div class="modal fade" id="TripModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content orange">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">COMING SOON!!</h5>
                                <h3>See Your Trips</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Here you will be able to see your previous and current trips, view itinerary, and other trip information!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary mbtn" data-dismiss="modal">Close</button>
                                {{--                                <button type="button" class="btn btn-primary">Save changes</button>--}}
                            </div>
                        </div>
                    </div>
                </div>
                {{--                Review/Edit Upcoming Travel Modal--}}
                <div class="modal fade" id="ReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content orange">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">COMING SOON!!</h5>
                                <h3>Review/Edit Upcoming Travel</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Here you will be able to view and edit upcoming trips that you have planned. Trip information will be available for
                                your reference and you will be able to make changes and submit for approval.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary mbtn" data-dismiss="modal">Close</button>
                                {{--                                <button type="button" class="btn btn-primary">Save changes</button>--}}
                            </div>
                        </div>
                    </div>
                </div>
                {{--                Report Modal--}}
                <div class="modal fade" id="ReportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content orange">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">COMING SOON!!</h5>
                                <h3>Enter Info While Traveling</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Here you will be able to enter information about your travel. Track expenses, log meals, and make note of any
                                information that is required for reporting.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary mbtn" data-dismiss="modal">Close</button>
                                {{--                                <button type="button" class="btn btn-primary">Save changes</button>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
