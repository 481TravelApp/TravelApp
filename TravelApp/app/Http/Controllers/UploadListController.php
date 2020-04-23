<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\View;

// TODO: This controller and TripListController are almost identical.
//		 Functionally, the only difference is the url that each returns
//		 This should be refactored so that one of the files is eliminated and the url is customizable
class UploadListController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function loadPage(Request $request)
    {
        if (Auth::guest())
		{
            return view('welcome');
		}
        else
		{
			$user = $request->user();
            $id = $user->id;
            $triplist = DB::select('select * from trips where user_id = ?', [$id]);
			
			$display_array = array();
			
			foreach ($triplist as $array_cast)
			{
				$trip = (array) $array_cast;
				$trip_display = $trip['starting_location'] . " to " . $trip['destination'] . " : " . $trip['start_date'] . " - " . $trip['end_date'];
				$trip_url = url('/docupload/') . "?id=" . $trip['id'];
				$single_trip_display = array('display' => $trip_display, 'url' => $trip_url);
				$display_array[] = $single_trip_display;
			}

            return view('upload', ['display_array' => $display_array]);
		}
    }
}
