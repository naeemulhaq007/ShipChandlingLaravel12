<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class InvoiceMaster extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="invoicemaster";
    protected $primaryKey = 'InvoiceNo';

    public $timestamps = false;

protected $fillable = [
        'Id'
      ,'InvoiceNo'
      ,'Date'
      ,'ActCode'
      ,'ActName'
      ,'GodownCode'
      ,'GodownName'
      ,'TotalAmt'
      ,'Description'
      ,'TotalQty'
      ,'TotalBonusQty'
      ,'TotalDiscAmt'
      ,'NetAmount'
      ,'Type'
      ,'RefNo'
      ,'WorkUser'
      ,'BranchCode'
      ,'TotalExpense'
      ,'PONo'
      ,'GodownCodeFrom'
      ,'GodownNameFrom'
      ,'TotalOrderQty'
      ,'TotalBalanceQty'
      ,'PaidAmt'
      ,'PVNo'
      ,'Terms'
      ,'DueDate'
      ,'OKToPay'
      ,'TotalReturnAmount'
      ,'InvoiceNoRET'
      ,'ChkLocked'
      ,'ChkPostInGodownAccount'
      ,'ChkPaySelect'
      ,'DepartmentCode'
      ,'DepartmentName'
      ,'CategoryCode'
      ,'CategoryName'
      ,'ChkAllDepartment'
      ,'ChkCategoryALL'
      ,'PDFPath'
      ,'ChkReceivedCompleted'
      ,'ChkAllowZeroRatedStock'
      ,'LINK'
      ,'ChkAdvancePayment'

];
}
