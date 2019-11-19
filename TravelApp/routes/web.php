<?php
use Illuminate\Support\Facades\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/success', function()
//{
//    return View::make('success');
//});
Route::get('/success', function() {
    return view('success');
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
Route::get('/welcome', function()
{
    return View::make('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/authorization', 'MailController@sendMail');
Route::get('/authorization', function()
{
    error_log('get');
    if (Auth::guest())
        return View::make('login');
    else
        return View::make('authorization');
});

//Route::match(['get', 'post'], '/authorization', function (Request $request) {
////
//
//    if (Request::isMethod('get')) {
//        error_log('get');
//        return View::make('authorization');
//    }

//    if (Request::isMethod('post')) {
//        error_log('post');
//        $to = "jtsmithers@gmail.com";
//        $subject = "Travel Authorization Request";
//        $message = "";
//        $headers = "From: do_not_reply@boisestate.edu" . "\r\n" .
//            "CC: nathandsteel@@gmail.com" . "\r\n" .
//            'X-Mailer: PHP/' . phpversion();
//
//        error_log(json_encode($request));
//
////        $first_name = $request['firstName'];
////        $last_name = $request['lastName'];
////
////        $message .= "First Name: ".clean_string($first_name)."/n";
////        $message .= "Last Name: ".clean_string($last_name)."/n";
//
//
//        error_log(mail($to, $subject, $message, $headers));
////    $to = "jasonsmith7@u.boisestate.edu@";
////    $subject = "My subject";
////    $txt = "Hello world!";
////    $headers = "From: do_not_reply@boisestate.edu" . "\r\n" . "CC: nathandsteele@gmail.com";
////    ​mail($to,$subject,$txt,$headers);
//
//        return view('welcome');
//    }
//});
//Route::post('/authorization', function (Request $request)
//{
//    error_log('post');
//    $to = "jasonsmith7@u.boisestate.edu@";
//    $subject = "My subject";
//    $txt = "Hello world!";
//    $headers = "From: do_not_reply@boisestate.edu" . "\r\n" . "CC: nathandsteele@gmail.com";
//    ​mail($to,$subject,$txt,$headers);
//    return View::make('welcome');
//});
//Route::post('sendemail', function (Request $request) {
//
//    $request = request()->validate([
//        'name' => 'required',
//        'email' => 'required| email',
//        'message' => 'required | max:1000'
//    ]);
//
//    Mail::to('jasonsmith7@u.boisestate.edu')->send(
//        new contact($request)
//    );
//
//    return "Your email has been sent successfully";
//
//});

