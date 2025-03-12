<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class VendorProductListAvgRate extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $table="vendorproductlistavgrate";
    protected $primaryKey = 'ID';

    public $timestamps = false;
    protected $fillable = [
        'ID'
      ,'ItemCode'
      ,'GodownCode'
      ,'LastPurc'
      ,'VendorCode'
      ,'BranchCode'
      ,'StockQty'
      ,'AvgRate'
      ,'LastDate'
      ,'LandCost'
      ,'WorkUser'
    ];
}
