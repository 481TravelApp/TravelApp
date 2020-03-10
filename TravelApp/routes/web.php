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
Auth::routes();

Route::get('/welcome', function()
{
    return View::make('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/authorization', 'MailController@sendMail');
Route::get('/authorization', 'TripViewController@loadPage');