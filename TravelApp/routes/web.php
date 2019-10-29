<?php

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
<<<<<<< HEAD

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/authorization', function()
{
    return View::make('authorization');
});
>>>>>>> 46198c405e1d27f4450310df5f43b5e58bec2adb
