<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class ExpensePaymentVoucher extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="expensepaymentvoucher";
    protected $primaryKey = 'VoucherNo';

    public $timestamps = false;
    protected $fillable = [
        'VoucherNo'
        ,'VoucherDate'
        ,'ReceiptNo'
        ,'TotAmount'
        ,'ActCashCode'
        ,'BankDesc'
        ,'TransType'
        ,'ActCode'
        ,'AcName3'
        ,'Amount'
        ,'ChequeNo'
        ,'Des'
        ,'ChequeDate'
        ,'BankName'
        ,'CashName'
        ,'BranchCode'
        ,'Currency'
        ,'ClientOrderNo'
        ,'WorkUser'
        ,'EntryDate'
        ,'AmountPKR'
        ,'PayType'
        ,'GodownCode'
        ,'PDFPath'
    ];
}
