<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class QuoteDetails extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="quotedetails";
    protected $primaryKey = 'Id';

    public $timestamps = false;


protected $fillable = [
    'Id'
      ,'QuoteNo'
      ,'EventNo'
      ,'ItemCode'
      ,'ItemName'
      ,'Qty'
      ,'PUOM'
      ,'VPart'
      ,'VendorPrice'
      ,'OurPrice'
      ,'SuggestPrice'
      ,'VendorCode'
      ,'CustomerNotes'
      ,'VendorNotes'
      ,'InternalBuyerNotes'
      ,'BranchCode'
      ,'OriginName'
      ,'Total'
      ,'VCategoryName'
      ,'Freight'
      ,'GPRate'
      ,'GPAmount'
      ,'LastDate'
      ,'VendorName'
      ,'ProductName'
      ,'Alternative'
      ,'QDate'
      ,'OurUOM'
      ,'DiscIncomePer'
      ,'DiscIncomeAmt'
      ,'CustomerName'
      ,'VesselName'
      ,'IMPA'
      ,'STKBuyOut'
      ,'Updated'
      ,'UpdatedDate'
      ,'SNo'
      ,'IMPAItemCode'
      ,'AgentCode'
      ,'AgentName'
      ,'AgentPer'
      ,'PortCode'
      ,'PortName'
      ,'FreightPer'
      ,'TotalCost'
      ,'OrderQty'
      ,'OrderAmount'
      ,'HasmateNo'
      ,'HasmateWeight'
      ,'HasMate'
      ,'FreightRate'
      ,'OverCommitQty'
      ,'GodownCode'
      ,'GodownName'
      ,'WorkUser'
      ,'LastPrice'
      ,'LastWorkUser'
      ,'VendorPartNo'
      ,'MCTCItemCode'
      ,'MCTCCategoryName'
      ,'MCTCItemDescription'
      ,'VesselNote'
      ,'ChkMCTC'

];
}
