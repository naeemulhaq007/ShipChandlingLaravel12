<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class ItemSetup extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="itemsetup";
    protected $primaryKey = 'ID';

    public $timestamps = false;
    protected $fillable = [
        'ID'
        ,'ItemCode'
        ,'ItemName'
        ,'UOM'
        ,'WorkUser'
        ,'Cost'
        ,'VendorCode'
        ,'VendorName'
        ,'VendorPN'
        ,'LastUpdate'
        ,'StockCode'
        ,'BranchCOde'
        ,'Packing'
        ,'OriginCode'
        ,'CatCode'
        ,'TypeCode'
        ,'TypeName'
        ,'SalePrice'
        ,'VendorCode2'
        ,'VendorCode3'
];
}
