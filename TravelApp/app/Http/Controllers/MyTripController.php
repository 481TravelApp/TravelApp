<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\View;


class MyTripController extends Controller
{
    /**
     * Shows information for and allows updating of a specific trip
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function loadPage(Request $request)
    {
        if (Auth::guest())
            return view('welcome');
        else
            $id = $request->input('id');
            $dbInfo = DB::select('select * from trips where id = ?', [$id]);
            $stupid = (array) $dbInfo[0];
            // if ($request->has('id')) {
            //     $stupid['id'] = $request->input('id');
            //     }
            return view('mytrip', ['dbInfo' => $stupid]);
    }


    public function updateTrip(Request $request)
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
		
		// TODO: Business begin and end dates are not displayed or updated
		//		 Nor are the University responsible travel costs
		//		 Need to make them viewable and updatable as well
		
        $updateDate = now(); // Hacky solution.

        $user = $request->user();
        $idKeyValue = $user->id;
		
        $id = $request->input('id');
        $successBool = DB::table('trips')
                            -> where('id', $id)
                            -> update([
                                'destination' => $destination,
                                'starting_location'=> $location,
                                'start_date'=> $start_date,
                                'end_date'=> $end_date,
                                'reason'=>$reason,
                                'payer'=>$payer,
                                'conference'=>$conference,
                                'business_purpose'=>$purpose,
                            ]);

        if($successBool) {
		// TODO: Refactor out this email stuff and use the mail controller instead of duplicating code
		//		 An email should also only be sent if the trip is updated
		
        //Creation of the email information.
        $to = $request->input('email');
        $subject = "Travel Authorization Request";
        $message = "";
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

        //error_log(mail($to, $subject, $message, $headers));

        return view('success');
        } else {
        return view('home');
        }
    }
}
