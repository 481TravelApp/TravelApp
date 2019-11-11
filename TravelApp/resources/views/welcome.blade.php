<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('includes.head')
        <title>Boise State Travel App</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                /*font-family: 'Nunito', sans-serif;*/
                font-family: 'Source Sans Pro', sans-serif;
                /*font-weight: 300;*/
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                font-weight: 400;
            }

            .title {
                font-size: 6vw;
                color: #0033a0;
                /*font-weight: bolder;*/
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .blue {
                background-color: #0033a0;
                border-color: #d64309;
            }
            .orange-inactive {
                background-color: #d64309;
                opacity: 0.85;
                border-color: #0033a0;
                color: #0033a0;
            }
            .modal-footer {
                text-align: center;
                border: none;
            }
            .modal-body {
                font-size: 2vh;
            }
            .modal-dialog {
                width: 80%;
                margin: 30px auto;
                padding: 10%;
                min-width: 250px;
                /*margin-top: 15%;*/
            }
            .modal-header {
                border: none;
            }
            .modal-content {
                position: relative;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #999;
                border: 1px solid rgba(0,0,0,.2);
                border-radius: 6px;
                -webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5);
                box-shadow: 0 3px 9px rgba(0,0,0,.5);
                outline: 0;
                height: 50%;
            }
            .modal-title {
                font-size: 3vh;
            }
            .orange {
                /*background-color: #d64309;*/
                background-color: white;
                opacity: .95;
                border-color: #0033a0;
                color: #0033a0;
            }
            .background {
                background-image: url('/images/bsu_logo.png');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position-x: 50%;
                background-position-y: 10%;
                background-size: 30%;
                background-color: rgba(255, 255, 255, 0.7);
                background-blend-mode: color-dodge;
            }
            .btn {
                margin-top: 10px;
                font-size: 2vw;
            }
            .btn
            .btn-secondary{
                /*font-weight: 500;*/
                font-weight: bolder;
            }
            .mbtn {
                width: 50%;
            }
            .col {
                min-width: 300px;
                width: 70%;
            }
        </style>
    </head>
    <header>
        @include('includes.header')
    </header>
    <body class="flex-center position-ref background">
{{--            <div>--}}
{{--                <img src="{{URL('/images/bsu_logo.png')}}" alt="bsu logo" style="max-width: 400px; top: 0; left: 0; opacity: .3; background-position: center; position: ; z-index: 1;">--}}
{{--            </div>--}}
            <div class="container content">

                <div class="row">
                    <div class="title">Boise State Travel App</div><br><br><br>
                </div>
                <div class="row">
                    <a href="{{ url('/authorization/') }}" class="col btn btn-primary btn-lg blue" type="button" id="newRequest">Submit a new travel request</a>
                </div>
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
