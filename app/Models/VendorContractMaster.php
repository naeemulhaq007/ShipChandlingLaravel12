<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class VendorContractMaster extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="vendorcontractmaster";
    protected $primaryKey = 'ComputerNo';

    public $timestamps = false;

    protected $fillable = [
        'ComputerNo'
        ,'BranchCode'
        ,'EntryDate'
        ,'ExpiryDate'
        ,'VendorName'
        ,'VendorCode'
        ,'VendorCodeUSA'
        ,'GodownCode'
        ,'GodownName'
        ,'DepartmentCode'
        ,'DepartmentName'
        ,'WorkUser'
        ,'TYPE'
    ];
}
