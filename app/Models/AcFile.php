<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class AcFile extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="acfile3";
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id'
        ,'ActCode'
        ,'AcCode3'
        ,'AcName3'
        ,'AcCode2'
        ,'AcCode1'
        ,'ChkInactive'
        ,'OpeningBalance'
        ,'ChkSupplier'
        ,'ChkCustomer'
        ,'ChkExpence'
        ,'RadDebitTrans'
        ,'RadCreditTrans'
        ,'RadDebit'
        ,'RadCredit'
        ,'ChkRecAC'
        ,'Address'
        ,'ChkLabour'
        ,'BranchCode'
        ,'OptType'
        ,'acode1'
        ,'acode2'
        ,'acode3'
        ,'acode4'
        ,'acode5'
        ,'acode6'
        ,'acode7'
        ,'acode8'
        ,'acode9'
        ,'acode10'
        ,'AcLevel'
        ,'TitleLevel1'
        ,'TitleLevel2'
        ,'TitleLevel3'
        ,'TitleLevel4'
        ,'TitleLevel5'
        ,'Address1'
        ,'Address2'
        ,'Address3'
        ,'Actype'
        ,'gst'
        ,'sameaddress'
        ,'phone'
        ,'fax'
        ,'email'
        ,'OpType'
        ,'ChkSalesMan'
        ,'ChkCrBill'
        ,'WorkUser'
        ,'ChkNoCost'
        ,'ChkIncome'
        ,'ChkDepreciation'
    ];
}
