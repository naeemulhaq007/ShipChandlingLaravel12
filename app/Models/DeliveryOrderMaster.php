<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DeliveryOrderMaster extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="deliveryordermaster";
    protected $primaryKey = 'InvoiceNo';

    public $timestamps = false;

protected $fillable = [
    "InvoiceNo"
      ,"RefNo"
      ,"VSNNo"
      ,"ChargeNo"
      ,"CustomerName"
      ,"Appr"
      ,"POAmount"
      ,"Freight"
      ,"Selected"
      ,"ShipVia"
      ,"ReqDate"
      ,"Time"
      ,"ShipTo"
      ,"VendorComment"
      ,"DepartmentName"
      ,"CustomerCode"
      ,"PurchaseOrderNo"
      ,"NoOfOrder"
      ,"TotalPO"
      ,"SelectedValue"
      ,"BranchCode"
      ,"Date"
      ,"EventNo"
      ,"QuoteNo"
      ,"Des"
      ,"LocationCode"
      ,"LocationName"
      ,"WorkUser"
      ,"VesselName"
      ,"OrderQty"
      ,"RecQty"
      ,"NotRecQty"
      ,"DeliveredQty"
      ,"ReturnQty"
      ,"MissingQty"
      ,"SoldQty"
      ,"DispatchDate"
      ,"DispatchTime"
      ,"RtnDate"
      ,"RtnTime"
      ,"TotGPAmt"
      ,"VendorActCode"
      ,"ChkDirectDelivery"
      ,"CustomerActCode"
      ,"GPCostAmt"
      ,"Status"
      ,"StatusCode"
      ,"StatusColorCode"

      ];
}
