<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Auth::check()) {
            $branchCode = Auth::user()->BranchCode;

            $branch = DB::table('BranchSetup')->where('BranchCode', $branchCode)->first();

            Config::set('custom.BranchPicture', $branch->pic ?? null);
            Config::set('custom.MBranchCode', $branchCode);
            Config::set('custom.BranchName', $branch->BranchName ?? null);
            Config::set('custom.Currency', $branch->Currency ?? null);
            Config::set('custom.PVendorCode', '756');
            Config::set('custom.MUserName', Auth::user()->UserName);
        }
    }
}
