<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Jumbojett\OpenIDConnectClient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Application;
use App;

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
        /**
         * This method uses OpenID to authenticate users via Boise State's authentication server. The openID uses jumbojett's library.
         * 
         * @return redirect or View
         */
        public function openid()
        {
            //This is for local development. If enviroment is set to local it will log in with this test account.
            if(App::environment('local')){
                $testExists = DB::table('users')->where('username', 'testuser')->exists();
                $userInfo = ['last_name'=>'user', 'first_name'=>'test', 'email' => 'testuser@nonexistant.com', 'username' => 'testuser', 'department' => 'testing department', 'BSU_id' => '0'];
                if($testExists){
                    $testUser = User::whereUsername('testuser')->first();
                    Auth::login($testUser);
                    return redirect('/home');
                }
                 else{
                    return view('auth.register',['email' => 'testuser@nonexistant.com', 'username' => 'testuser']);
                 }
            }
            
            //unique_name and upn are the array names given to username and email when sent back from Boise State's servers.
            else{
                $provider = config('openid.provider');
                $clientid = config('openid.clientid');
                $secret = config('openid.secret');
                $oidc = new OpenIDConnectClient($provider, $clientid, $secret);
                $oidc->setAllowImplicitFlow(true);
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
                    return view('auth.register',['email' => $username['upn'], 'username' => strtolower($username['unique_name'])]);
                }

             }
        }
}
