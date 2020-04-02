<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\View;


class MyTripController extends Controller
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
            $id = $request->input('id');
            $dbInfo = DB::select('select * from trips where id = ?', [$id]);
            $stupid = (array) $dbInfo[0];
            // if ($request->has('id')) {
            //     $stupid['id'] = $request->input('id');
            //     }
            return view('mytrip', ['dbInfo' => $stupid]);
    }
}
