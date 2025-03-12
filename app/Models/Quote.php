<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class Quote extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="quotemaster";
    protected $primaryKey = 'ID';

    public $timestamps = false;

    public function Event()
    {
        return $this->belongsTo('EventInvoice');
    }
protected $fillable = [
    'ID'
    ,'QuoteNo'
    ,'QDate'
    ,'QTime'
    ,'EventNo'
    ,'CustomerCode'
    ,'CustomerRefNo'
    ,'ReturnVia'
    ,'DepartmentCode'
    ,'BidDueDate'
    ,'EstLineQuote'
    ,'DueTime'
    ,'BranchCode'
    ,'DepartmentName'
    ,'Terms'
    ,'OE'
    ,'Buyer'
    ,'DiscPer'
    ,'ChkQuoteEntry'
    ,'ChkCosting'
    ,'ChkPricing'
    ,'Header'
    ,'Total'
    ,'GSTPer'
    ,'ValueAmount'
    ,'CostAmount'
    ,'GPAmount'
    ,'Status'
    ,'StatusColorCode'
    ,'StatusCode'
    ,'CreatedDate'
    ,'CreatedTime'
    ,'USDRate'
    ,'WorkUser'
    ,'GivenDisc'
    ,'DiscIncome'
    ,'TotalDiscIncomeAmt'
    ,'Freight'
    ,'VSNNo'
    ,'FlipOrderNo'
    ,'FlipDAte'
    ,'CustomerName'
    ,'VesselName'
    ,'CustCode'
    ,'CstItems'
    ,'PricingItems'
    ,'GPPer'
    ,'QSentDate'
    ,'QSentTime'
    ,'FlippedAmount'
    ,'Comments'
    ,'AgentCode'
    ,'AgentName'
    ,'AgentPer'
    ,'POrtCode'
    ,'POrtName'
    ,'WorkUserActive'
    ,'CustomerRefNoPO'
    ,'GodownCode'
    ,'GodownName'
    ,'VendorDiscPer'
    ,'CrNotePer'
    ,'AVIRebatePer'
    ,'AgentCommPer'
    ,'SlsCommPer'
    ,'CrNoteAmount'
    ,'AVIRebateAmt'
    ,'AgentCommAmt'
    ,'SlsCommAmt'
    ,'ChkSendToVendor'
    ,'ChkRekey'
    ,'ChkSentToCust'
    ,'HOT'
    ,'WorkUserLog'
    ,'AssignQuote'
    ,'EnteredLineQuote'
    ,'SalesManActCode'
    ,'SalesManName'
    ,'SalesManNotes'
    ,'SalesManCode'
    ,'VesselCode'
    ,'ChkFlip'
    ,'CashDiscAmt'
    ,'GrossAmount'
    ,'WorkUserSentToCust'
    ,'WorkUserQuoteEntry'
    ,'WorkUserSentToVendor'
    ,'WorkUserCosted'
    ,'WorkSellPricied'
    ,'WorkUserREKey'
    ,'WorkUserSentToCust1'
    ,'ChkUpload'
    ,'Pic'
    ,'QuoteID'
    ,'BuyerTradeNetID'
    ,'SupplierTradeNetID'
    ,'IMONumber'
    ,'Currency'
    ,'TransID'
    ,'TokenNo'

];
}
