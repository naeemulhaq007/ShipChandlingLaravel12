<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class OpeningBalance extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="openingbalance";

    protected $primaryKey="ID";

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
    ,'ActCapitalCode'
    ,'BranchCode'
    ,'Currency'
];
}
