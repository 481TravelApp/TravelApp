<!DOCTYPE html>
<html lang="en">
<!-- this is the trip submission success confirmation page. -->
<head>
    <title>Authorization Page</title>
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
            <img id="banner" src="/images/boisestate-leftalignedmark-orange.png">
        </a>
    </div>
</header>
<body class="" style="background-color: #f1f1f1">
<div class="jumbotron text-center">
    <h1 class="display-3">Success!</h1>
    <p class="lead">Your information has been sent! <strong>You will receive a confirmation email shortly.</strong> You will be contacted via that email thread by administrative personnel should any more information be needed</p>
    <hr>
{{--    <p>--}}
{{--        Having trouble? <a href="">Contact us</a>--}}
{{--    </p>--}}
    <p class="lead">
        <a class="btn btn-primary btn-sm" href="{{url('/')}}" role="button">Return to Home</a>
    </p>
</div>
</body>
{{--<script>--}}
{{--    function goHome() {--}}
{{--        return '{{view('welcome')}}';--}}
{{--    }--}}
{{--</script>--}}
</html>
