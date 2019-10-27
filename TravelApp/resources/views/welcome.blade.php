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

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
            }

            .title {
                font-size: 84px;
                color: #0033a0;
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
                opacity: 0.5;
                border-color: #0033a0;
                color: #0033a0;
            }
            .orange {
                background-color: #d64309;
            }
        </style>
    </head>
{{--    <header>--}}
{{--        @include('includes.header')--}}
{{--    </header>--}}
    <body class="flex-center position-ref">
            <div class="container content">
                <div class="row">
                    <div class="title">Boise State Travel App</div><br><br><br>
                </div>
                <div class="row">
                    <a href="{{ url('/authorization/') }}" class="col-sm-6 btn btn-primary btn-lg blue" type="button" id="newRequest">Submit a new travel request</a>
                    <button class="col-sm-6 btn btn-primary btn-lg orange-inactive" type="button" id="seeTrips">See your trips</button>
                </div>
                <div class="row">
                <button class="col-sm-6 btn btn-primary btn-lg orange-inactive" type="button" id="reviewEdit">Review/Edit upcoming travel</button>
                <button class="col-sm-6 btn btn-primary btn-lg orange-inactive" type="button" id="enterInfo">Enter info while traveling</button>
                </div>
            </div>
    </body>
</html>
