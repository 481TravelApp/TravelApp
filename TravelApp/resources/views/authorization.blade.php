<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

?>
<!-- This is the trip submission page. -->
<!-- TODO: This should really be renamed to "submission.blade.php" or something similar -->
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
    <h2>Travel Authorization Request Form</h2>
    <form role="form" action="" method="post">
        @csrf
{{--        Row 1--}}
        <h3><i class="glyphicon glyphicon-user"></i>Traveler's Information</h3>
        <p>Please review the <a href="https://www.boisestate.edu/policy/finance/policy-title-travel/" target="_blank">Travel Policy #6180</a> for more information.</p>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="email">Employee or Student Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $dbInfo['email'] }}" required readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="firstName">Traveler's First Name*</label>
                <input type="text" class="form-control" name="firstName" id="firstName" value="{{ $dbInfo['first_name'] }}" required readonly>
            </div>
            <div class="form-group col-sm-6">
                <label for="lastName">Traveler's Last Name*</label>
                <input type="text" class="form-control" name="lastName" id="lastName" value="{{ $dbInfo['last_name'] }}" required readonly>
            </div>
        </div>
{{--        Row 2--}}
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="empID">Traveler's Employee ID*</label>
                <input type="number" class="form-control" name="empID" id="empID" value="{{ $dbInfo['BSU_id'] }}" required readonly>
            </div>
            <div class="form-group col-sm-6">
                <label for="dept">Traveler's Department:</label>
                <input type="text" class="form-control" name="dept" id="dept" value="{{ $dbInfo['department'] }}" required readonly>
            </div></div>
        <h3><i class="glyphicon glyphicon-plane"></i>  Trip Information</h3>
{{--        Travel Date Row--}}
        <div class="row">    
            <div class="form-group col-sm-6">
                <label for="destination">Travel Destination</label>
                <input type="destination" class="form-control" name="destination" id="destination" placeholder="Travel Destination" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label class="control-label" for="startDate">Travel Begin Date</label>
                <input class="form-control" id="startDate" name="startDate" placeholder="MM/DD/YYY" type="text"/>
            </div>
            <div class="form-group col-sm-6">
                <label class="control-label" for="endDate">Travel End Date</label>
                <input class="form-control" id="endDate" name="endDate" placeholder="MM/DD/YYY" type="text"/>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="empLoc">Starting Location:</label>
                <input type="text" class="form-control" name="location" id="empLoc" placeholder="City, State, Country" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="dept">Conference (Optional)</label>
                <input type="text" class="form-control" name="conference" id="conference" placeholder="Is this for a conference? If so, which one?">
            </div></div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="empID">Travel Business Purpose:</label>
                <textarea type="email" class="form-control" name="purpose" id="purpose" placeholder="Enter Purpose of Travel" rows="3" required></textarea>
            </div></div>
        <hr>
        <div class="row">
            <div class="form-group col-sm-12">
            <label class="control-label" for="personalBusiness">Is personal travel scheduled in conjunction with business travel? *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="reason" id="exampleRadios1" value="Yes" onclick="hide()">
                    <label class="form-check-label" for="exampleRadios1">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="reason" id="exampleRadios2" value="No" onclick="show()" checked>
                    <label class="form-check-label" for="exampleRadios2">
                        No
                    </label>
                </div>
        </div></div>
{{--        Business Travel Dates--}}
        <div class="row busDates" id="busDates">
            <div class="form-group col-sm-6">
                <label class="control-label" for="busStartDate">Business Begin Date</label>
                <input class="form-control" id="busStartDate" name="busStartDate" placeholder="MM/DD/YYY" type="text"/>
            </div>
            <div class="form-group col-sm-6">
                <label class="control-label" for="busEndDate">Business End Date</label>
                <input class="form-control" id="busEndDate" name="busEndDate" placeholder="MM/DD/YYY" type="text"/>
            </div></div>
        <div class="row">
            <div class="form-group col-sm-12">
            <label class="control-label" for="busChoice">Who will pay travel costs? *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payer" id="thirdparty" value="Third Party" onclick="hide_costs()" checked>
                    <label class="form-check-label" for="thirdparty">
                        Third Party: Responsible in whole for the employee travel cost, also known as, "No cost travel."
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payer" id="university" value="University" onclick="show_costs()">
                    <label class="form-check-label" for="university">
                        University: Responsible in part or whole for the employee travel cost.
                    </label>
                </div>
            </div></div>
        <div class="row estimates" id="estimates">
            <label class="col-xs-12" style="font-weight: bold">
                Please provide estimated costs for the following items:
            </label>
            <div class="row">
            <div class="col-xs-5">
                <label for="ex2">Registration</label>
                <input class="form-control" id="registration" name="registration" type="number">
            </div>
            <div class="col-xs-5">
                <label for="ex2">Air Fair</label>
                <input class="form-control" id="air_fare" name="air_fare" type="number">
            </div></div>
            <div class="row">
            <div class="col-xs-5">
                <label for="ex2">Lodging</label>
                <input class="form-control" id="lodging" name="lodging" type="number">
            </div>
            <div class="col-xs-5">
                <label for="ex2">Transportation</label>
                <input class="form-control" id="transportation" name="transportation" type="number">
            </div></div>
            <div class="row">
            <div class="col-xs-5">
                <label for="ex2">Baggage</label>
                <input class="form-control" id="baggage" name="baggage" type="number">
            </div>
            <div class="col-xs-5">
                <label for="ex2">Parking</label>
                <input class="form-control" id="parking" name="parking" type="number">
            </div></div>
            <div class="row">
            <div class="col-xs-5">
                <label for="ex2">Other</label>
                <input class="form-control" id="other" name="other" type="number">
            </div></div>
        </div>
        <div class="row">
            <button type="submit" name="submit" id="submit" class="btn btn-default blue col-sm-4" value="submit">Submit</button>
{{--            <a class="col-sm-6 btn btn-default btn-lg blue" type="submit" name="submit" id="submit">Submit</a>--}}
        </div>
    </form>
    {{--                See Your Trips Modal--}}
    <div class="modal fade" id="ConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content orange">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                </div>
                <div class="modal-body">
                    Your travel authorization form has been submitted
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/') }}" type="button" class="btn btn-primary mbtn" data-dismiss="modal">Close</a>
                    {{--                                <button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>
</div>
</body>


<script>
    $(document).ready(function(){
        var date_input=$('input[name="startDate"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    })
    $(document).ready(function(){
        var date_input=$('input[name="endDate"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    })
    $(document).ready(function(){
        var date_input=$('input[name="busStartDate"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    })
    $(document).ready(function(){
        var date_input=$('input[name="busEndDate"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    })
    function show(){
        document.getElementById('busDates').style.display ='none';
    }
    function hide(){
        document.getElementById('busDates').style.display = 'block';
    }
    function show_costs(){
        document.getElementById('estimates').style.display = 'block';
    }
    function hide_costs() {
        document.getElementById('estimates').style.display = 'none';
    }
</script>
</html>
