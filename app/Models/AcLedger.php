<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class AcLedger extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="acledger";
    protected $primaryKey = 'ActCode';

    public $timestamps = false;

    protected $fillable = [
        'ActCode'
      ,'Des'
      ,'Debit'
      ,'Credit'
      ,'Date'
      ,'Vnon'
      ,'RefNo'
      ,'Vnoc'
      ,'TransAmt'
      ,'Mark'
      ,'Balance'
      ,'TransType'
      ,'BranchCode'
      ,'WorkUser'
      ,'ChqNo'
      ,'ChqDate'
      ,'ChkRecon'
      ,'ActName'
      ,'ID'
      ,'FillColor'
    ];
}
