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
                $oidc->addAuthParam('roles');
                $oidc->authenticate();
                $asdf = $oidc->getVerifiedClaims();              
                $username = var_dump($asdf->{'unique_name'});
                
                if(DB::table('users')->where('username',$username)->exits()){
                    ?>
                    <pre> failed </pre>
                    <?php
                }
                else{
                    ?>
                        <pre> User: <?php echo $username;?> </pre>
                    <?php
                }
                           
                ?>
                <pre>
                    <?php echo var_dump($asdf); echo var_dump($abcd);?>
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
