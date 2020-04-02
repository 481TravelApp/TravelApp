<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jumbojett\OpenIDConnectClient;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

       public function openid()
       {
               $provider = config('openid.provider');
               $clientid = config('openid.clientid');
               $secret = config('openid.secret');

               $oidc = new OpenIDConnectClient($provider, $clientid, $secret);

               // $oidc->setResponseTypes(['id_token']);
               // $oidc->addScope(['openid']);
               $oidc->setAllowImplicitFlow(true);
               // $oidc->addAuthParam(['response_mode' => 'form_post']);

               // Successfully redirects user to Boise State login page but an
               // error is returned by that page
               $oidc->authenticate();
       }

       public function openidredirect()
       {
               // Need to somehow verify the data sent to this page and then
               // authenticate the user with Auth facade.
               //
               // See https://laravel.com/docs/5.8/authentication#other-authentication-methods
       }
}
