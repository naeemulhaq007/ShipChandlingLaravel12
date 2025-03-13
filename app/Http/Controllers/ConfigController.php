<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ConfigController extends Controller
{
    public static function setConfig()
    {
        if (Auth::check()) {
            $user = Auth::user();
            info('Authenticated user:', ['user' => $user]);

            $branchCode = $user->BranchCode;
            $branch = DB::table('branchsetup')->where('BranchCode', $branchCode)->first();

            session([
                'BranchPicture' => $branch->pic ?? null,
                'MBranchCode' => $branchCode,
                'BranchName' => $branch->BranchName ?? null,
                'Currency' => $branch->Currency ?? null,
                'PVendorCode' => '756',
                'MUserName' => $user->UserName
            ]);

            info('Branch data stored in session.', ['BranchName' => session('BranchName')]);

            return true;
        }

        return false;
    }
}
