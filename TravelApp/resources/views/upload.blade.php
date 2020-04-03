<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Trip Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    @include('includes.head')
</head>
<header class="header-custom">
    <div class="logo1">
            <a href="{{url('/')}}"></a>
            <img id="banner" src="/images/boisestate-leftalignedmark-orange.png">
    </div>
</header>
<body class="">
@guest

@endguest
<div class="bootsrap-iso container fpad">
    <a href="{{ url('welcome') }}">Back to Welcome Page</a>
    
    <h2>Upload Trip Documents</h2>
</div>
</body>
</html>