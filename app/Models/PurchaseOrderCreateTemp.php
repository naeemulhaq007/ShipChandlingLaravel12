<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class PurchaseOrderCreateTemp extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="purchaseordercreatetemp";
    protected $primaryKey = 'ID';

    public $timestamps = false;

protected $fillable = [
        'ID'
      ,'ChargeNo'
      ,'VSNNo'
      ,'ChkBuy'
      ,'BuyBy'
      ,'PONo'
      ,'VendorName'
      ,'VendorCode'
      ,'Qty'
      ,'Cost'
      ,'CostAmt'
      ,'Terms'
      ,'BranchCode'
];

}
