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
<body class="fileTable">
@guest

@endguest
<div class="bootsrap-iso container fpad">
	<a href="{{ url('upload') }}">
		<button type="button" name="back" id="back" class="btn btn-default blue guh" value="back">Back to Trip Selection</button>
	</a></br>

   

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif
    
    
    <div class='fileTable' id='container'>
    
    <h1 class='fileTable'>Files Uploaded for your Trip from {{ $dbInfo['starting_location']}} to {{ $dbInfo['destination'] }}</h1>

    <table class='fileTable'>
        <thead class='fileTable'>
            <tr class='fileTable'>
                <th class='fileTable'>File Name</th>
                <th class='fileTable'>File Type</th>
                <th class='fileTable'>Size <small class='fileTable'>(bytes)</small></th>
                <th class='fileTable'>Date Added</th>
                <th class='fileTable'>Delete File</th>
            </tr>
        </thead>
        <tbody class='fileTable'>
        @foreach ($fileInfo as $file_object)
        <tr class='fileTable'>
            <td class='fileTable'>
                <a href="download/{{ $file_object['id'] }}">{{ $file_object['original_name'] }}</a>
            </td>
            <td class='fileTable'><a class='fileTable'>{{ $file_object['extension'] }}</a></td>
            <td class='fileTable'><a class='fileTable'>{{ Storage::size($file_object['file_name']) }}</a></td>
            <td class='fileTable'><a class='fileTable'>{{ $file_object['created_at'] }}</a></td>
            <td class='fileTable'>
                <a href="delete/{{ $file_object['id'] }}" class='fileTable'>Delete File</a>
            </td>
        </tr>
        @endforeach
        <tr class='fileTable'>
            
        </tr>
        
        </tbody>
    </table>


    </div>
    <div class='fileTable' id='container'>

    <table class='fileTable'>
        <thead class='fileTable'>
            <tr class='fileTable'>
                <th class='fileTable'>Upload a File.</th>
            </tr>
        </thead>
        <tbody class='fileTable'>
            <tr class='fileTable'>
                <td class='fileTable'>
                    <form action="{{ route('file.upload.post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control uploadfrm">

                        <button type="submit" class="btn btn-success uploadbtn">Upload</button>

                        <input type="hidden" id="tripNum" name="tripNum" value="{{ $tripNum }}">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
