<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\View;


class GetUserInfoController extends Controller
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
            $dbInfo = DB::select('select * from users where id = ?', [$id]);
			
			// The previous selection returns an array of arrays, but only has 1 entry
			// This just pulls that out and casts it as an array
            $singleArray = (array) $dbInfo[0];

            return view('authorization', ['dbInfo' => $singleArray]);
    }
}
