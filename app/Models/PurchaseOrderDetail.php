<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class PurchaseOrderDetail extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="purchaseorderdetail";
    protected $primaryKey = 'ID';

    public $timestamps = false;

protected $fillable = [
    "ID"
    ,"VSNNo"
    ,"EventNo"
    ,"QuoteNo"
    ,"ChargeNo"
    ,"PurchaseOrderNo"
    ,"ChkRcvd"
    ,"ItemCode"
    ,"ItemName"
    ,"Qty"
    ,"PUOM"
    ,"Price"
    ,"EstPrice"
    ,"BranchCode"
    ,"DepartmentName"
    ,"QID"
    ,"STKBuyOut"
    ,"ProductName"
    ,"Freight"
    ,"GPAmount"
    ,"VendorName"
    ,"VendorPrice"
    ,"OurPrice"
    ,"OriginName"
    ,"VPart"
    ,"CustomerNotes"
    ,"VendorNotes"
    ,"InternalBuyerNotes"
    ,"VendorCode"
    ,"VCategoryName"
    ,"GPRate"
    ,"LastDate"
    ,"Alternative"
    ,"OurUOM"
    ,"DiscIncomePer"
    ,"DiscIncomeAmt"
    ,"IMPA"
    ,"Date"
    ,"OrderID"
    ,"OrderQty"
    ,"RecQty"
    ,"NotRecQty"
    ,"OverQty"
    ,"DeliveredQty"
    ,"ReturnQty"
    ,"MissingQty"
    ,"GodownCode"
    ,"DeliveryCharges"
    ,"ExchangeRateAdjustment"
    ,"ChkPaymentPaid"
    ,"SNO"
    ,"IMPAItemCode"
    ,"CancelQty"
    ,"ChkCancelledPO"
    ,"MoveToStock"
    ,"MoveToStockAmt"
    ,"ItemCodeStock"
    ,"SplitPONo"
    ,"AmountReturn"
    ,"VendorPartNo"
];
}
