<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\View;


class TripViewController extends Controller
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
            $stupid = (array) $dbInfo[0];

            return view('authorization', ['dbInfo' => $stupid]);
    }
}
