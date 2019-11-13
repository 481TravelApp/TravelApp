<?php
////if(isset($_POST['submit'])){
////    console.log("yo");
////    $to = "jasonsmith7@u.boisestate.edu@";
////    $subject = "My subject";
////    $txt = "Hello world!";
////    $headers = "From: do_not_reply@boisestate.edu" . "\r\n" . "CC: nathandsteele@gmail.com";
////    ​mail($to,$subject,$txt,$headers);
////    }
////
//
//if(isset($_POST['submit']))
//{
//    $to      = 'jtsmithers@gmail.com';
//    $subject = 'the subject';
//    $message = 'hello';
//    $headers = 'From: do_not_reply@boisestate.edu' . "\r\n" .
//        'Reply-To: do_not_reply@boisestate.edu' . "\r\n" .
//        'X-Mailer: PHP/' . phpversion();
//
//    mail($to, $subject, $message, $headers);
//
//    echo 'Email Sent.';
//}
//
//?>

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
        .green {
            background-color: #4bb543;
            color: white;
        }
        .background-auth {
            background-image: url('/images/bsu_logo.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position-x: 50%;
            background-position-y: 50%;
            background-size: 50%;
            background-color: rgba(255, 255, 255, 0.9);
            background-blend-mode: color-dodge;
        }
        .busDates {
            display: none;
        }
    </style>
</head>
<body class="background-auth">
<div class="bootsrap-iso container">
    <h2>BSU Travel Authorization Request Form</h2>
    <form role="form" action="" method="post">
        @csrf
{{--        Row 1--}}
        <h3><i class="glyphicon glyphicon-user"></i>Traveler's Information</h3>
        <p>Please review the <a href="https://www.boisestate.edu/policy/finance/policy-title-travel/">Travel Policy #6180</a> for more information.</p>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="firstName">Traveler's First Name*</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter First Name">
            </div>
            <div class="form-group col-sm-6">
                <label for="lastName">Traveler's Last Name*</label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter Last Name">
            </div></div>
{{--        Row 2--}}
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="empID">Traveler's Employee ID*</label>
                <input type="number" class="form-control" name="empID" id="empID" placeholder="Enter Employee ID">
            </div>
            <div class="form-group col-sm-6">
                <label for="dept">Traveler's Department:</label>
                <input type="text" class="form-control" name="dept" id="dept" placeholder="Enter Department">
            </div></div>
{{--        Row 3--}}
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="empLoc">Traveler's Location:</label>
                <input type="text" class="form-control" name="location" id="empLoc" placeholder="City, State, Country">
{{--                <label>City, State, Country</label>--}}
            </div>
            <div class="form-group col-sm-6">
                <label for="dept">Search Term Keywords (Optional)</label>
                <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Enter Search Term Keywords">
            </div></div>
{{--        Row 4--}}
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="empID">Travel Business Purpose:</label>
                <textarea type="email" class="form-control" name="purpose" id="purpose" placeholder="Enter Purpose of Travel" rows="3"></textarea>
            </div></div>
        <hr>
        <h3><i class="glyphicon glyphicon-plane"></i>  Trip Information</h3>
{{--        Travel Date Row--}}
        <div class="row">
            <div class="form-group col-sm-6">
                <label class="control-label" for="startDate">Travel Begin Date</label>
                <input class="form-control" id="startDate" name="startDate" placeholder="MM/DD/YYY" type="text"/>
                {{--                <label>City, State, Country</label>--}}
            </div>
            <div class="form-group col-sm-6">
                <label class="control-label" for="endDate">Travel End Date</label>
                <input class="form-control" id="endDate" name="endDate" placeholder="MM/DD/YYY" type="text"/>
            </div></div>
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
                <label class="control-label" for="busStartDate">Travel Begin Date</label>
                <input class="form-control" id="busStartDate" name="busStartDate" placeholder="MM/DD/YYY" type="text"/>
            </div>
            <div class="form-group col-sm-6">
                <label class="control-label" for="busEndDate">Travel End Date</label>
                <input class="form-control" id="busEndDate" name="busEndDate" placeholder="MM/DD/YYY" type="text"/>
            </div></div>
        <div class="row">
            <div class="form-group col-sm-12">
            <label class="control-label" for="busChoice">Who will pay travel costs? *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payer" id="exampleRadios1" value="University">
                    <label class="form-check-label" for="exampleRadios1">
                        University: Responsible in part or whole for the employee travel cost.
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payer" id="exampleRadios2" value="Third Party" checked>
                    <label class="form-check-label" for="exampleRadios2">
                        Third Party: Responsible in whole for the employee travel cost, also known as, "No cost travel.
                    </label>
                </div>
            </div></div>
        <div class="row">
{{--            <button type="submit" name="submit" id="submit" class="btn btn-default blue col-sm-4" value="submit" data-toggle="modal" data-target="#ConfirmationModal">Submit</button>--}}
            <a href="{{ url('/welcome/') }}" class="col-sm-6 btn btn-default btn-lg blue" type="submit" name="submit" id="submit">Submit</a>
        </div>
    </form>
    {{--                See Your Trips Modal--}}
    <div class="modal fade" id="ConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content orange">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Success</h5>
{{--                    <h3>See Your Trips</h3>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                </div>
                <div class="modal-body">
                    Your travel authorization form has been submitted
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
    function show(){
        document.getElementById('busDates').style.display ='none';
    }
    function hide(){
        document.getElementById('busDates').style.display = 'block';
    }
</script>
</html>
