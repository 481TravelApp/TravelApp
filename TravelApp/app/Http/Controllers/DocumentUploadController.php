<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\View;


class DocumentUploadController extends Controller
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
            return view('docupload', ['dbInfo' => $stupid, 'tripNum' => $id]);
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        $id = $request->input('tripNum');
        $uploadFolder = $id.'uploadFolder';
        Log::debug($uploadFolder);
        //$path = Storage::putFile('avatars', $request->file('avatar'));
        //Storage::put(storage_path($uploadFolder), request()->file('file'), 'private');
        $path = Storage::putFile($uploadFolder, $request->file('file'));
        //$request->file->move(storage_path($uploadFolder), request()->file('file'));
        //Storage::setVisibility('request()->file('file'), 'private');
        return view('welcome');

        //return back()
        //    ->with('success','You have successfully uploaded a file.')
        //    ->with('file',$fileName);
    }

}