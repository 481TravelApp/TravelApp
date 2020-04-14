<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Form;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>File Upload</title>
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
            <a href="{{url('/')}}">
            <img id="banner" src="/images/boisestate-leftalignedmark-orange.png"></a>
    </div>
</header>
<body class="">
@guest

@endguest
<div class="bootsrap-iso container fpad">
	    <a href="{{ url('upload') }}">
		<button type="button" name="back" id="back" class="btn btn-default blue" value="back">Back to Trip Selection</button>
	</a>

    <h2>Upload a File.</h2>
        <form action="{{ route('file.upload.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <input type="file" name="file" class="form-control">
            </div>
   
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>

            <input type="hidden" id="tripNum" name="tripNum" value="{{ $tripNum }}">
        </form>
    <h2>Files Uploaded for this Trip.</h2>
    <p>TODO: Restructure the database to hold file paths and display downloadable links to them here as they get added to the page with the above form. 
    See: https://laravel.com/docs/7.x/filesystem#retrieving-files</p>
</div>
</body>
</html>
