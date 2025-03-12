<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Customer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="customersetup";
    protected $primaryKey = 'ID';

    public $timestamps = false;
    public function CustomerDiscount()
    {
        return $this->hasMany(\App\Models\CustomerDiscount::class);
    }
    static function LikeName($Name){
        return  Customer::where('CustomerName','like', '%'.$Name.'%')->get();
    }



protected $fillable = [
    'ID'
      ,'CustomerCode'
      ,'CustomerName'
      ,'Address'
      ,'CallSign'
      ,'PhoneNo'
      ,'FaxNo'
      ,'EmailAddress'
      ,'WebAddress'
      ,'BContactPerson'
      ,'BillingAddress'
      ,'BTelephoneNo'
      ,'BFaxNo'
      ,'BEmailAddress'
      ,'BWeb'
      ,'Status'
      ,'ChkInactive'
      ,'CreditLimit'
      ,'Country'
      ,'BranchCode'
      ,'CusCode'
      ,'Terms'
      ,'EventQuateCharges'
      ,'City'
      ,'ActCode'
      ,'CustomerDiscPer'
      ,'InvoiceDiscPer'
      ,'SalesManCommPer'
      ,'RebaitPer'
      ,'CreditNotePer'
      ,'AgentCommPer'
      ,'BankDetail'
      ,'Priority'
      ,'EnterCustomer'
      ,'CType'
      ,'Vtype'
      ,'CustCategory'
      ,'AreaofBusiness'
      ,'AreaCode'
      ,'ContactPerson'
      ,'StateName'
      ,'CashDiscPer'
      ,'MobileNo'
      ,'SManCode'
      ,'SManActCode'
      ,'WorkUser'
      ,'AgentCode'
      ,'AgentActCode'
      ,'AssignUser'
      ,'LastEditDateTime'
      ,'CHKTBN'
      ,'AccountingNotes'

];


}
