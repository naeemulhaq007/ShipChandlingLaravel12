<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class JournalVoucher extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="journalvoucher";
    protected $primaryKey = 'ID';

    public $timestamps = false;
    protected $fillable = [
        'ID'
        ,'VoucherNo'
        ,'ReceiptNo'
        ,'ActCode'
        ,'DrAmt'
        ,'CrAmt'
        ,'Des'
        ,'Date'
        ,'TotDrAmount'
        ,'TotCrAmount'
        ,'BranchCode'
        ,'Currency'
        ,'ActName3'
        ,'GodownCode'
];
}
