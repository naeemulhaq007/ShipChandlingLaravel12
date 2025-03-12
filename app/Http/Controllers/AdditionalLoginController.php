<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdditionalLoginController extends Controller
{
    public function showAdditionalLoginForm()
    {
        // Logic to display the additional login form
        return view('additional-login-form');
    }
}
