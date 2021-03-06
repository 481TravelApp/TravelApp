<?php


namespace App\Http\Controllers;

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MailController extends Controller
{

    /**
     * Saves the inputs to the database and sends emails to relevant parties
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sendMail(Request $request)
    {
        //Trip information
        //Add destination
        $destination = $request->input('destination');
        $conference = $request->input('conference');
        $location = $request->input('location');
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

        $creationDate = now(); // Hacky solution.

        $user = $request->user();
        $idKeyValue = $user->id;

        $successBool = DB::insert('insert into trips (user_id, destination, starting_location, start_date, end_date, reason, payer, conference, business_purpose, created_at) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',[$idKeyValue, $destination, $location, $start_date, $end_date, $reason, $payer, $conference, $purpose, $creationDate]);

        if($successBool) {

        //Creation of the email information.
        $to = $request->input('email');
        $subject = "Travel Authorization Request";
        $message = "";
		// TODO: Don't always send CCs to this email once the program is more sophisticated
		//		 it should send to the administration of the user's department
        $cc = "CC: CMGT@boisestate.edu";
        $headers = "From: CMGT@boisestate.edu" . "\r\n" .
            $cc . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        //User information
        $first_name = $request->input('firstName');
        $last_name = $request->input('lastName');
        $emp_id = $request->input('empID');
        $dept = $request->input('dept');
        //$keywords = $request->input('keywords');

        //Email creation and sending
        $message .= "First Name: ".$first_name."\n";
        $message .= "Last Name: ".$last_name."\n";
        $message .= "Employee ID: ".$emp_id."\n";
        $message .= "Department: ".$dept."\n";
        $message .= "Location: ".$location."\n";
        //$message .= "Search Term Keywords: ".$keywords."\n\n";
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

		// Uncommenting this line will allow emails to actually be sent
		// It is left commented out for testing so as not to spam emails
		// TODO: Enable/disable this behavior based on an environmental variable
        //error_log(mail($to, $subject, $message, $headers));

        return view('success');
        } else {
        return view('home');
        }
    }
}
