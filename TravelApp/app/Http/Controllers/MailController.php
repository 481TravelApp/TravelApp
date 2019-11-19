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
//        error_log($request->has('other'));
        error_log(trim($request->input('other')) == '');
//        $request = $_POST;
        $to = "jasonsmith7@u.boisestate.edu";
        $subject = "Travel Authorization Request";
        $message = "";
        $cc = "CC: nathandsteele@gmail.com, jtsmithers@gmail.com, justinstiffler@u.boisestate.edu, ianhooyboer@u.boisestate.edu";
        $headers = "From: do_not_reply@boisestate.edu" . "\r\n" .
            $cc . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
//        $headers = "From: do_not_reply@boisestate.edu" . "\r\n" .
//            'X-Mailer: PHP/' . phpversion();

//        error_log($request->input('firstName'));
//        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
//        $out->writeln("Hello from Terminal");

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
        $bus_start = $request->input('busStartDate');
        $bus_end = $request->input('busEndDate');
        $payer = $request->input('payer');
        $registration = $request->input('registration');
        $air_fare = $request->input('air_fare');
        $lodging = $request->input('lodging');
        $transportation = $request->input('transportation');
        $baggage = $request->input('baggage');
        $parking = $request->input('parking');
        $other = $request->input('other');
//
        $message .= "First Name: ".$first_name."\n";
        $message .= "Last Name: ".$last_name."\n";
        $message .= "Employee ID: ".$emp_id."\n";
        $message .= "Department: ".$dept."\n";
        $message .= "Location: ".$location."\n";
        $message .= "Search Term Keywords: ".$keywords."\n\n";
        $message .= "Travel Business Purpose: "."\n\n".$purpose."\n\n";
        $message .= "Travel Begin Date: ".$start_date."\n";
        $message .= "Travel End Date: ".$end_date."\n";

        $message .= "Is personal travel scheduled in conjunction with business travel: ".$reason."\n";
        if (trim($reason) == 'Yes') {
            $message .= "Business Travel Begin Date: " . $bus_start . "\n";
            $message .= "Business Travel End Date: " . $bus_end . "\n";
        }
        $message .= "Who will pay travel costs: ".$payer."\n";
        if (trim($payer) == 'University') {
            $message .= "Estimated Costs:" . "\n";
            $message .= "\tRegistration: " . $registration . "\n";
            $message .= "\tAir Fare: " . $air_fare . "\n";
            $message .= "\tLodging: " . $lodging . "\n";
            $message .= "\tTransportation: " . $transportation . "\n";
            $message .= "\tBaggage: " . $baggage . "\n";
            $message .= "\tParking: " . $parking . "\n";
            $message .= "\tOther: " . $other . "\n";
        }

        $subject .= " [".$first_name." ".$last_name."]";

        error_log($message);


        error_log(mail($to, $subject, $message, $headers));
//        return view('welcome');
//        $note = "Your information has been sent! You will receive a confirmation email shortly. You will be contacted via that email thread by
//        administrative personnel should any more information be needed.";
//        echo "<script type='text/javascript'>alert('$note');</script>";
//        return 1;
//        return "<script type='text/javascript'>alert('$note');</script>";
        return view('success');
    }
}
