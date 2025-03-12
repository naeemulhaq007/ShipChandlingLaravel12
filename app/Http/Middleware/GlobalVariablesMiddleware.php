<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GlobalVariablesMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $branchCode = Auth::user()->BranchCode;
            $UserName = Auth::user()->UserName;
            $branchdata = DB::table('BranchSetup')->where('BranchCode',$branchCode)->first();
            $BranchName = $branchdata->BranchName;
            $BranchPicture = $branchdata->pic;
            $Currency = $branchdata->Currency;
            config(['app.MBranchCode' => $branchCode]);
            config(['app.BranchName' => $BranchName]);
            config(['app.Currency' => $Currency]);
            config(['app.PVendorCode' => '756']);
            config(['app.MUserName' => $UserName]);
            config(['app.BranchPicture' => $BranchPicture]);
        }

        return $next($request);
    }
}

