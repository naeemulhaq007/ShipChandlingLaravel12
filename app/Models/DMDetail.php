<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class DMDetail extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="dmdetail";
    protected $primaryKey = 'ID';

    public $timestamps = false;

protected $fillable = [
    'ID'
      ,'ChargeNo'
      ,'VSNNo'
      ,'EventNo'
      ,'QuoteNo'
      ,'ItemCode'
      ,'ItemName'
      ,'PUOM'
      ,'BranchCode'
      ,'POMadeNo'
      ,'POMadeDate'
      ,'VendorCode'
      ,'VendorName'
      ,'VendorPrice'
      ,'DiscPerVendor'
      ,'CostPrice'
      ,'WorkUser'
      ,'OrderQty'
      ,'RecQty'
      ,'ReturnQty'
      ,'MissingQty'
      ,'SoldQty'
      ,'SNo'
      ,'GodownCode'
      ,'ReturnCostAmt'
      ,'VendorActCode'
      ,'OrderID'
      ,'DepartmentName'
      ,'SellPrice'
      ,'DMReturnQty'
      ,'DMReturnAmt'
      ,'DMMoveToStock'
      ,'DMMoveToStockAmt'
      ,'DMMissingQty'
      ,'DMMissingAmt'
      ,'IMPAItemCode'
      ,'DepartmentCode'

];
}
