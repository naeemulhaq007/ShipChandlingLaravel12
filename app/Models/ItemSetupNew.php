<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ItemSetupNew extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="itemsetupnew";
    protected $primaryKey = 'ID';

    public $timestamps = false;
    protected $fillable = [
    'ID'
    ,'ItemCode'
    ,'Date'
    ,'IMPACode'
    ,'ItemName'
    ,'DepartmentCode'
    ,'CategoryCode'
    ,'BrandCode'
    ,'ClassCode'
    ,'UOM'
    ,'PurchaseRate'
    ,'Currency'
    ,'SaleRate'
    ,'WorkUser'
    ,'BranchCode'
    ,'ReorderLevel'
    ,'ReorderQty'
    ,'Type'
    ,'AvgRate'
    ,'EntryDate'
    ,'ChkInactive'
    ,'ItemCodeN'
];
}

