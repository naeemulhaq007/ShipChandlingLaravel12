<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class PurchaseOrderMaster extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="purchaseordermaster";
    protected $primaryKey = 'PurchaseOrderNo';

    public $timestamps = false;

protected $fillable = [
    "PurchaseOrderNo"
    ,"Date"
    ,"VSNNo"
    ,"ChargeNo"
    ,"EventNo"
    ,"QuoteNo"
    ,"VendorName"
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
    ,"VendorCode"
    ,"NoOfOrder"
    ,"TotalPO"
    ,"SelectedValue"
    ,"BranchCode"
    ,"WorkUser"
    ,"PODate"
    ,"ActCode"
    ,"PORecDate"
    ,"PORecTime"
    ,"OrderQty"
    ,"RecQty"
    ,"NotRecQty"
    ,"Des"
    ,"CustomerName"
    ,"VesselName"
    ,"GodownCode"
    ,"BuyerName"
    ,"BuyerEmail"
    ,"Atten"
    ,"PORecAmt"
    ,"Terms"
    ,"GstPer"
    ,"GstAmt"
    ,"NetAmount"
    ,"DiscPer"
    ,"DiscAmt"
    ,"GrossAmt"
    ,"ExchangeRateAdjustment"
    ,"DeliveryCharges"
    ,"ChkPaymentPaid"
    ,"VendorActCode"
    ,"PaidAmt"
    ,"TotalReturnAmount"
    ,"ReturnQty"
    ,"RestockingCharges"
    ,"VendorRefNo"
    ,"DueDate"
    ,"PVNo"
    ,"CancelQty"
    ,"ChkCancelledPO"
    ,"MoveToStock"
    ,"SaleInvNo"
    ,"PurcReturnDate"
    ,"OKToPay"
    ,"SplitPONo"
    ,"ChkPaySelect"
    ,"PDFPath"
    ,"Link1"
    ,"Link2"
    ,"Link3"
    ,"Link4"
    ,"Link5"
    ,"Link6"
    ,"ChkReceivedCompleted"
];
}
