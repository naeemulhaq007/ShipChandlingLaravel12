<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class BillDetailIncome extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="billdetailincome";
    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'ID'
        ,'BillNo'
        ,'BranchCode'
        ,'type'
        ,'RefNo'
        ,'Date'
        ,'LastDate'
        ,'Description'
        ,'Quantity'
        ,'Rate'
        ,'Amount'
        ,'ExpActCode'
        ,'CrActCode'
        ,'Des'
        ,'WorkUser'
        ,'OKToPay'
        ,'SupplierCode'
        ,'Terms'
    ];

}
