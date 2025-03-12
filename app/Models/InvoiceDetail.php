<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class InvoiceDetail extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="invoicedetail";
    protected $primaryKey = 'Id';

    public $timestamps = false;

protected $fillable = [
    'Id'
      ,'InvoiceNo'
      ,'Date'
      ,'ActCode'
      ,'ActName'
      ,'GodownCode'
      ,'GodownName'
      ,'ItemCode'
      ,'ItemName'
      ,'Origin'
      ,'UOM'
      ,'Quantity'
      ,'BonusQty'
      ,'TradePrice'
      ,'RetailPrice'
      ,'GrossAmount'
      ,'DiscPer'
      ,'DiscAmt'
      ,'TotalAmt'
      ,'TotalQty'
      ,'TotalBonusQty'
      ,'TotalDiscAmt'
      ,'NetAmount'
      ,'Description'
      ,'Type'
      ,'RefNo'
      ,'WorkUser'
      ,'BranchCode'
      ,'VendorCode'
      ,'BatchNo'
      ,'ExpiryDate'
      ,'TotQty'
      ,'AvgRate'
      ,'InvRate'
      ,'ExpPer'
      ,'InvAmt'
      ,'BarCode'
      ,'ExpireBarCode'
      ,'SoldQty'
      ,'PullInvNo'
      ,'DepartmentName'
      ,'DepartmentCode'
      ,'SaleRate'
      ,'PONO'
      ,'DiffQty'
      ,'StockQty'
      ,'GodownCodeFrom'
      ,'GodownNameFrom'
      ,'IMPAItemCode'
      ,'Remarks'
      ,'OrderQty'
      ,'BalanceQty'
      ,'StockAmount'

];
}
