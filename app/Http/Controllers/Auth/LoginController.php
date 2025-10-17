<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use LdapRecord\Models\ActiveDirectory\User;
use LdapRecord\Laravel\Auth\ListensForLdapBindFailure;
use Dcblogdev\MsGraph\Facades\MsGraph;
use Illuminate\Support\Facades\Auth;


// use LdapRecord\Models\OpenLDAP\User;

class LoginController extends Controller
{
    use AuthenticatesUsers, ListensForLdapBindFailure;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */



    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
       return 'username';
    }

    protected function credentials(Request $request)
    {
        // $data=User::where('samaccountname','adam')->get();
        // dd($data);
       return [
           'samaccountname' =>$request->username,
           'password' =>$request->password
       ];
    }
    public function logout()
    {
        
        if (env('APP_TEST')) {
            Auth::logout();
            return redirect()->route('login');
 
         }
        return MsGraph::disconnect();
    }

}
