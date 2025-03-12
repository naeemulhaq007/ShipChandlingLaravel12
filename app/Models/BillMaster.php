<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class BillMaster extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="billmaster";
    protected $primaryKey = 'BillNo';

    public $timestamps = false;

    protected $fillable = [
        'BillNo'
      ,'BranchCode'
      ,'RefNo'
      ,'Date'
      ,'LastDate'
      ,'CrActCode'
      ,'Des'
      ,'BillAmount'
      ,'Type'
      ,'WorkUser'
      ,'OKToPay'
      ,'SupplierCode'
      ,'PDFPath'
      ,'Terms'
    ];


}
