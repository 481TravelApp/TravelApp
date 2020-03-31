<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\View;


class TripListController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function loadPage(Request $request)
    {
        if (Auth::guest())
            return view('welcome');
        else
			$user = $request->user();
            $id = $user->id;
            $triplist = DB::select('select * from trips where user_id = ?', [$id]);

            return view('trips', ['triplist' => $triplist]);
    }
}
