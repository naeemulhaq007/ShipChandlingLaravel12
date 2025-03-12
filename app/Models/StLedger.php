<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class StLedger extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="stledger";
    protected $primaryKey = 'ItemCode';

    public $timestamps = false;

    protected $fillable = [
        'ItemCode'
        ,'ItemName'
        ,'Date'
        ,'Vnon'
        ,'RefNo'
        ,'Des'
        ,'StockIn'
        ,'Stockout'
        ,'Balance'
        ,'Type'
        ,'PartyCode'
        ,'Carat'
        ,'GodownCode'
        ,'BranchCode'
        ,'WorkUser'
        ,'DepartmentName'
        ,'UOM'
        ,'VesselName'
        ,'IMPAItemCode'
        ,'GodownName'
        ,'Rate'
        ,'Amount'
        ,'PONO'
    ];
}
