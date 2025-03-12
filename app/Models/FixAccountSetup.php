<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class FixAccountSetup extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="fixaccountsetup";
    protected $primaryKey = 'ActCashCode';
    public $timestamps = false;


    protected $fillable = [
    'ActCashCode'
      ,'ActSalesCode'
      ,'ActPurchaseCode'
      ,'ActPurRetCode'
      ,'ActSalesRetCode'
      ,'MCapCode'
      ,'BranchCode'
      ,'ActCreditCardCode'
      ,'ActOrderCode'
      ,'LCode'
      ,'StockVendorCode'
      ,'StockVendorName'
      ,'UnEarnCommCode'
      ,'UnEarnCommName'
      ,'CommIncomeCode'
      ,'CommIncomeName'
      ,'GSTCode'
      ,'GSTName'
      ,'SalaryCode'
      ,'SalaryName'
      ,'GstIncomeCode'
      ,'GstIncomeName'
      ,'MissingActCode'
      ,'MissingActName'
      ,'PurStockCode'
      ,'PurStockName'
      ,'CrNoteCode'
      ,'CrNoteName'
      ,'CommExpCode'
      ,'CommExpName'
      ,'StockAdjustCode'
      ,'StockAdjustName'
      ,'COGSCode'
      ,'COGSName'
      ,'AVIExpCode'
      ,'AVIExpName'
      ,'AVIPayableCode'
      ,'AVIPayableName'
      ,'BankChargesActCode'
      ,'BankChargesActName'
      ,'BackLogDate'
      ,'CompanyTAxActCode'
      ,'CompanyTaxActName'
      ,'EmpTAxActCode'
      ,'EmpTAxActName'
      ,'DeductionActCode'
      ,'DeductionActName'
      ,'CTaxActCodeExp'
      ,'CTaxActNameExp'
      ,'MileageCode'
      ,'MileageName'
      ,'HealthInsCode'
      ,'IncomeAndRevenueActCode'
      ,'IncomeAndRevenueActName'
      ,'RetainedEarningActCode'
      ,'RetainedEarningActname'
      ,'BackLogStockDate'
      ,'TripChargesCode'
      ,'GarnishmentCode'
      ,'PORecDirectSupplyCode'
      ,'DateDirectSupply'
      ,'PullStockForSaleActCode'
      ,'PullStockForSaleActName'
    ];
}
