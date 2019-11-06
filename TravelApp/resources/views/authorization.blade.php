<!DOCTYPE html>
<html lang="en">
<head>
    <title>Authorization Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <style>
        .blue {
            background-color: #0033a0;
            color: white;
    }
    </style>
</head>
<body>
<div class="bootsrap-iso container">
    <h2>BSU Travel Authorization Request Form</h2>
    <form action="" methond="post">
{{--        Row 1--}}
        <h3><i class="glyphicon glyphicon-user"></i>  Traveler's Information</h3>
        <p>Please review the <a href="https://www.boisestate.edu/policy/finance/policy-title-travel/">Travel Policy #6180</a> for more information.</p>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="firstName">Traveler's First Name*</label>
                <input type="text" class="form-control" id="firstName" placeholder="Enter First Name">
            </div>
            <div class="form-group col-sm-6">
                <label for="lastName">Traveler's Last Name*</label>
                <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
            </div></div>
{{--        Row 2--}}
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="empID">Traveler's Employee ID*</label>
                <input type="number" class="form-control" id="empID" placeholder="Enter Employee ID">
            </div>
            <div class="form-group col-sm-6">
                <label for="dept">Traveler's Department:</label>
                <input type="text" class="form-control" id="dept" placeholder="Enter Department">
            </div></div>
{{--        Row 3--}}
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="empLoc">Traveler's Location:</label>
                <input type="text" class="form-control" id="empLoc" placeholder="City, State, Country">
{{--                <label>City, State, Country</label>--}}
            </div>
            <div class="form-group col-sm-6">
                <label for="dept">Search Term Keywords (Optional)</label>
                <input type="text" class="form-control" id="dept" placeholder="Enter Search Term Keywords">
            </div></div>
{{--        Row 4--}}
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="empID">Travel Business Purpose:</label>
                <textarea type="email" class="form-control" id="empID" placeholder="Enter Purpose of Travel" rows="3"></textarea>
            </div></div>
        <hr>
        <h3><i class="glyphicon glyphicon-plane"></i>  Trip Information</h3>
{{--        Travel Date Row--}}
        <div class="row">
            <div class="form-group col-sm-6">
                <label class="control-label" for="date">Travel Begin Date</label>
                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
                {{--                <label>City, State, Country</label>--}}
            </div>
            <div class="form-group col-sm-6">
                <label class="control-label" for="date">Travel End Date</label>
                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
            </div></div>
        <div class="row">
            <div class="form-group col-sm-12">
            <label class="control-label" for="personalBusiness">Is personal travel scheduled in conjunction with business travel? *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="personal/businessRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="personal/businessRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        No
                    </label>
                </div>
        </div></div>
        <div class="row">
            <div class="form-group col-sm-12">
            <label class="control-label" for="busChoice">Who will pay travel costs? *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="travelCostRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        University: Responsible in part or whole for the employee travel cost.
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="travelCostRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Third Party: Responsible in whole for the employee travel cost, also known as, "No cost travel.
                    </label>
                </div>
            </div></div>
        <div class="row">
{{--            <button type="submit" name="submit" class="btn btn-default blue col-sm-4" value="submit">Submit</button>--}}
            <a href="{{ url('/welcome/') }}" class="col btn btn-primary btn-lg blue" type="button" id="newRequest">Submit</a>
        </div>
    </form>
</div>
</body>
<?php
if(isset($_POST['submit'])){
    console.log("yo");
    $to = "jason.smith@u.boisestate.edu@";
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: do_not_reply@boisestate.edu" . "\r\n" . "CC: nathandsteele@gmail.com";
    ​mail($to,$subject,$txt,$headers);
    }
?>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    })
</script>
</html>
