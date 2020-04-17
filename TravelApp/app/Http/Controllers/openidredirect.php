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
                $provider = config('openid.provider');
                $clientid = config('openid.clientid');
                $secret = config('openid.secret');

                $oidc = new OpenIDConnectClient($provider, $clientid, $secret);

                $oidc->setAllowImplicitFlow(true);
                $oidc->addScope('roles');
                $oidc->authenticate();
                $asdf = $oidc->getVerifiedClaims();
                $abcd = $oidc->getAccessToken();
                
              //  $data = DB::table('users')
               //                 ->
                
                ?>
                <pre>
                    <?php echo var_dump($oidc); echo var_dump($abcd); echo $asdf[0];?>
                </pre>
                <?php
                //return view('home');
                // die();
                // See https://laravel.com/docs/5.8/authentication#other-authentication-methods
        }

        public function openidredirect()
        {
        }
}
