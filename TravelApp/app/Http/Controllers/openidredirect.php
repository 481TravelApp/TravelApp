<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Jumbojett\OpenIDConnectClient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
                $username = (array)$asdf;
                $userExists = DB::table('users')->where('username',strtolower($username['unique_name']))->exists();

                if($userExists){
                    $user = User::whereUsername([strtolower($username['unique_name'])])->first();
                    Auth::login($user);
                    return redirect('/home');
                }
                else{
                    ?>
                        <p> User: <?php echo var_dump($username['unique_name']);?> </p>
                    <?php
                    return view('auth.register',['email' => $username['upn'], 'username' => strtolower($username['unique_name'])]);
                }
                //return view('home');
                // die();
                // See https://laravel.com/docs/5.8/authentication#other-authentication-methods
        }

        public function openidredirect()
        {
        }
}
