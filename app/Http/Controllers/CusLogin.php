<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CusLogin extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'UserName' => ['required'],
            'Password' => ['required'],
        ]);

        $is_login_valid=User::where("UserName",$request->UserName)->where("Password",$request->Password)->first();
        info($request->UserName);
        info($request->Password);
        if($is_login_valid) {
            $request->session()->regenerate();
            Auth::loginUsingId($is_login_valid->UserID);
            return redirect()->intended('/Vplat-Quote?eventno=1678&quoteno=5124&BranchCode=1&VendorCode=39');
        }

        return back()->withErrors([
            'UserName' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showLoginForm(){
        return view('CustomLogin.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended('CustomLogin.login');
    }

}
