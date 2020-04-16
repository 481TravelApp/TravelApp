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
            $tripInfo = DB::select('select * from trips where id = ?', [$id]);
            $fileInfo = DB::select('select * from files where trip_id = ?', [$id]);
            $stupid = (array) $tripInfo[0];
            $fileInfo = (array) $fileInfo;
            for($i = 0; $i < count($fileInfo); $i++) {
                $fileInfo[$i] = (array) $fileInfo[$i];
            }

            return view('docupload', ['dbInfo' => $stupid, 'tripNum' => $id, 'fileInfo' => $fileInfo]);
    }

    public function downloadFile($id)
    {
        $id = (int) $id;
        //Get the filename
        $filename = DB::select("select file_name from files where id = ?", [$id]);

        $filename = $filename[0];

        $filename = (array) $filename;

        $filename = $filename['file_name'];

        $filename = (String) $filename;

        $ogname = DB::select("select original_name from files where id = ?", [$id]);

        $ogname = $ogname[0];

        $ogname = (array) $ogname;

        $ogname = $ogname['original_name'];

        $ogname = (String) $ogname;

        return Storage::download($filename, $ogname);
    }

    public function deleteFile($id)
    {
        
        $id = (int) $id;
        //Get the filename
        $filename = DB::select("select file_name from files where id = ?", [$id]);
        Log::debug($filename);

        $filename = $filename[0];
        //Log::debug($filename1);

        $filename = (array) $filename;
        Log::debug($filename);

        $filename = $filename['file_name'];
        Log::debug($filename);

        $filename = (String) $filename;
        //Delete the file from the local storage.
        Storage::disk('local')->delete($filename);

        //Delete the entry in the database
        DB::delete('delete from files where id = ?',[$id]);
        return back()->with('success', "The file has been deleted.");
    }

    public function uploadFile(Request $request)
    {
        //Validate the file.
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);

        //If the file exists...
        if ($request->hasFile('file')) {

            //Get a reference to the file.
            $file = $request->file('file');

            //Get the trip number.
            $trip_id_num = $request->input('tripNum');
            
            //Setup the Upload Folder
            $uploadFolder = 'DocumentUploads';

            //Store the file and grab the path.
            $path = Storage::disk('local')->putFile($uploadFolder, $file);

            //Get the original name of the file
            $og_name = $file->getClientOriginalName();

            //Get the extension type
            $extension = $file->extension();

            Log::debug($og_name);

            //Get the current time.
            $creationDate = now(); // Hacky solution.
            
            //File visibility.
            Storage::setVisibility($path, 'private');

            if($path) {

                //Make a file in the database.
                $successBool = DB::insert('insert into files (trip_id, extension, file_name, original_name, created_at) values(?, ?, ?, ?, ?)', [$trip_id_num, $extension, $path, $og_name, $creationDate]);

                if($successBool) {
                    return back()->with('success', 'The File was Uploaded Successfully.');
                } else {

                    //Delete the file since the database addition failed.
                    Storage::disk('local')->delete($path);
                    return back()->with('fail', 'Something went wrong with adding the file to the database.');
                }

            } else {
                return back()->with('fail', 'Something went wrong with adding the file to the local disk.');
            }

          } else {
              return back()->with('fail', 'Please Include a File to Upload.');
          }
    }
}