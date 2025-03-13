<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ConfigController;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
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
    // protected $redirectTo = '/home';
    protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }
    public function login(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'UserName' => ['required'],
            'Password' => ['required'],
            'BranchCode' => ['required'],
        ]);
        $UserName =  $request->UserName;


        $is_login_valid=User::where("UserName",$UserName)->where("Password",$request->Password)->where('BranchCode',$request->BranchCode)->first();
        if($is_login_valid) {
            $request->session()->regenerate();
            Auth::loginUsingId($is_login_valid->UserID);
            if(!ConfigController::setConfig()){
                ConfigController::setConfig();
            }
            // dd(Auth::check(), Auth::user());
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'UserName' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended('/');
    }
}
