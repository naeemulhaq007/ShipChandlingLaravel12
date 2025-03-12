<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdditionalLoginMiddleware
{
    public function handle(Request $request, Closure $next)
{
    // Check if the user has already completed the additional login
    if (!$request->session()->has('additional_login')) {
        // Additional login logic here
        // ...
        // Example: Check if the additional login credentials match a specific condition
        $additionalLoginSuccessful = $request->input('additional_login') === 'your_additional_login_condition';

        if ($additionalLoginSuccessful) {
            // Mark the additional login as completed in the session
            $request->session()->put('additional_login', true);
        } else {
            // Additional login failed, redirect the user to the additional login page
            return redirect()->route('additional-login');
        }
    }

    // Proceed to the regular login process
    return $next($request);
}

}
