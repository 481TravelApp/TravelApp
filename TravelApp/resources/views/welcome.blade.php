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
    <div class="logo1">
            <a href="{{url('/')}}">
            <img id="banner" src="/images/boisestate-leftalignedmark-orange.png"></a>
    </div>
            @include('includes.header')
    </header>
    <body class="">
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
                        <a href="{{ url('/openidredirect') }}" class="col btn btn-primary btn-lg blue" type="button" id="newRequest">Submit a new travel request</a>
                    </div>
                @endguest
				
				@auth
                    <div class="row">
                        <a href="{{ url('/trips/') }}" class="col btn btn-primary btn-lg blue" type="button" id="seeTrips">See or Edit your trips</a>
                    </div>
                @endauth
                @guest
                    <div class="row">
                        <a href="{{ url('/openidredirect') }}" class="col btn btn-primary btn-lg blue" type="button" id="seeTrips">See or Edit your trips</a>
                    </div>
                @endguest
				
				@auth
                    <div class="row">
                        <a href="{{ url('/upload/') }}" class="col btn btn-primary btn-lg blue" type="button" id="enterInfo">Enter info while traveling</a>
                    </div>
                @endauth
                @guest
                    <div class="row">
                        <a href="{{ url('/openidredirect') }}" class="col btn btn-primary btn-lg blue" type="button" id="enterInfo">Enter info while traveling</a>
                    </div>
                @endguest
            </div>
    </body>
</html>
