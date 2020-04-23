<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

?>
<!-- this is the page that prints the trip list out for editing. -->
<!-- TODO: This page and upload.blade.php are almost identical. Maybe code could be deduplicated between them? -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>List of Trips</title>
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
    <a href="{{ url('welcome') }}">
		<button type="button" name="back" id="back" class="btn btn-default blue" value="back">Back to Welcome Page</button>
	</a>
	
    <h2>List of all submitted trips</h2>
	
	@if (count($display_array) <= 0)
		There are no submitted trips!<br>
	@else
		@if (count($display_array) == 1)
			There is 1 submitted trip!<br>
		@else
			There are <?php echo count($display_array) ?> submitted trips!<br>
		@endif
		<br>
		@foreach ($display_array as $trip)
			<a class="triplink" href=<?php echo $trip['url'] ?>>
				<div class="tripbox">
					<?php echo $trip['display'] ?>
				</div>
			</a>
		@endforeach
	@endif
	
</div>
</body>
</html>