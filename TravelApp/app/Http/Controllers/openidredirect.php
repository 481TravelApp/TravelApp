<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jumbojett\OpenIDConnectClient;

class openidredirect extends Controller
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
                //$provider = config('openid.provider');
                //$clientid = config('openid.clientid');
                //$secret = config('openid.secret');

                $provider = 'https://weblogin.boisestate.edu/adfs/services/trust';
                $clientid = 'd22e09fe-e1db-4cb8-bd48-71cb9db01ce4';
                $secret = '84nar0E0a3mhrp94w8uXidWoOd0XvtyvgflLDqcN';

                $oidc = new OpenIDConnectClient($provider, $clientid, $secret);

                $oidc->setAllowImplicitFlow(true);
                $oidc->addScope('roles');
                $oidc->authenticate();

                // Testing stuff
                $asdf = $oidc->getVerifiedClaims();
                return view('home');
                // die();
                // Need to somehow verify the data sent to this page and then
                // authenticate the user with Auth facade.
                //
                // See https://laravel.com/docs/5.8/authentication#other-authentication-methods
        }

        public function openidredirect()
        {
        }
}
