<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class testlocal extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $connection = 'localserv';

    protected $table="VenderProductList";
    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        "ID"
      ,"Date"
      ,"ItemCode"
      ,"ItemName"
      ,"UOM"
      ,"OriginName"
      ,"VendorPrice"
      ,"Currency"
      ,"LastRate"
      ,"Diff"
      ,"LastDate"
      ,"CommPer"
      ,"Rate"
      ,"CategoryCode"
      ,"DepartmentCode"
      ,"VenderCode"
      ,"VenderName"
      ,"BranchCode"
      ,"ItemCodeN"
      ,"VCategoryName"
      ,"OurPrice"
      ,"GP"
      ,"DiscPer"
      ,"VPartCode"
      ,"Updated"
      ,"Freight"
      ,"IMPAItemCode"
      ,"ReorderLevel"
      ,"ReorderQty"
      ,"AvgRate"
      ,"BarCode"
      ,"StockQty"
      ,"ChkNoGP"
      ,"PortCode"
      ,"PortName"
      ,"FixedPrice"
      ,"BasePrice"
      ,"VendorCodeItem"
      ,"VendorNameItem"
      ,"ChkPERISHABLE"
      ,"ItemSize"
      ,"VendorCusCode"
      ,"Commodity"
      ,"GodownCode"
      ,"GodownName"
      ,"ComputerNo"
      ,"ExpiryDate"
      ,"Type"
      ,"ChkInactive"
      ,"WorkUser"
      ,"GIFT"
      ,"VendorPartNo"
      ,"StockLocation"
      ,"ChkStromme"
      ,"Remarks"
      ,"FixItem"


    ];
}
