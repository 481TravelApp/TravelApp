<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jumbojett\OpenIDConnectClient;
use Illuminate\Support\Facades\DB;

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
                $oidc->addAuthParam('roles');
                $oidc->authenticate();
                $asdf = $oidc->getVerifiedClaims();              
                $username = var_dump($asdf->{'unique_name'});
                $userExists = DB::table('users')->where('username',$username)->exists();

                if($userExists){
                    ?>
                    <pre> failed </pre>
                    <?php
                }
                else{
                    ?>
                        <p> User: <?php echo $username;?> </p>
                    <?php
                }
                //return view('home');
                // die();
                // See https://laravel.com/docs/5.8/authentication#other-authentication-methods
        }

        public function openidredirect()
        {
        }
}
