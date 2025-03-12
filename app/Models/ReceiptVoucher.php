<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class ReceiptVoucher extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="receiptvoucher";
    protected $primaryKey = 'ID';

    public $timestamps = false;

protected $fillable = [
    'ID'
    ,'VoucherNo'
    ,'VoucherDate'
    ,'TotAmount'
    ,'ActCashCode'
    ,'CashName'
    ,'TransType'
    ,'ActCode'
    ,'AcName3'
    ,'BankName'
    ,'Amount'
    ,'ChequeNo'
    ,'ChequeDate'
    ,'Des'
    ,'ClientOrderNo'
    ,'BranchCode'
    ,'Currency'
    ,'ChkRecComm'
    ,'RefNo'
    ,'VesselName'
    ,'BankDes'
    ,'InvRecAmt'
    ,'BankCharges'
    ,'PayType'
    ,'WorkUser'
];
}
