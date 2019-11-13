<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sendMail(Request $request)
    {
        error_log('post');
//        $request = $_POST;
        $to = "jasonsmith7@u.boisestate.edu";
        $subject = "Travel Authorization Request";
        $message = "";
        $headers = "From: do_not_reply@boisestate.edu" . "\r\n" .
            "CC: nathandsteele@gmail.com" . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        error_log($request->input('firstName'));

        $first_name = $request->input('firstName');
        $last_name = $request->input('lastName');
        $emp_id = $request->input('empID');
        $dept = $request->input('dept');
        $location = $request->input('location');
        $keywords = $request->input('keywords');
        $purpose = $request->input('purpose');
        $start_date =  $request->input('startDate');
        $end_date = $request->input('endDate');
        $reason = $request->input('reason');
        $payer = $request->input('payer');
//
        $message .= "First Name: ".$first_name."\n";
        $message .= "Last Name: ".$last_name."\n";
        $message .= "Employee ID: ".$emp_id."\n";
        $message .= "Department: ".$dept."\n";
        $message .= "Location: ".$location."\n";
        $message .= "Search Term Keywords: ".$keywords."\n";
        $message .= "Travel Business Purpose: "."\n".$purpose."\n";
        $message .= "Travel Begin Date: ".$start_date."\n";
        $message .= "Travel End Date: ".$end_date."\n";
        $message .= "Is personal travel scheduled in conjunction with business travel: ".$reason."\n";
        $message .= "Who will pay travel costs: ".$payer."\n";

        $subject .= " [".$first_name." ".$last_name."]";


        error_log(mail($to, $subject, $message, $headers));
        return view('welcome');
    }
}
