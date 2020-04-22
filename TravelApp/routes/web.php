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

Route::get('/success', function() {
    return view('success');
});

Route::get('/trips', function() {
    return view('trips');
});

Route::get('/upload', function() {
    return view('upload');
});

Route::get('/mytrip', function() {
    return view('mytrip');
});

Route::get('/welcome', function()
{
    return View::make('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/authorization', 'MailController@sendMail');
Route::get('/authorization', 'TripViewController@loadPage');

Route::get('/trips', 'TripListController@loadPage');
Route::get('/mytrip', 'MyTripController@loadPage');
Route::post('/mytrip', 'MyTripController@updateTrip');

Route::get('/upload', 'UploadListController@loadPage');
Route::get('/docupload', 'DocumentUploadController@loadPage');
Route::post('/docupload', 'DocumentUploadController@uploadFile')->name('file.upload.post');
Route::get('/download/{id}', 'DocumentUploadController@downloadFile')->name('file.download.get');
Route::get('/delete/{id}', 'DocumentUploadController@deleteFile')->name('file.delete.delete');

Route::get('/openidredirect', 'openidredirect@openid')->name('oidlogin');
//Route::get('/openidredirect', 'openidredirect@openid')->name('oidlogin');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@getRegister')->name('register');
Route::post('register', 'Auth\RegisterController@register');


