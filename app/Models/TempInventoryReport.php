<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class TempInventoryReport extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="tempinventoryreport";
    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'ID'
      ,'ItemCode'
      ,'ItemName'
      ,'IMPAItemCode'
      ,'DepartmentName'
      ,'CategoryName'
      ,'OrgineName'
      ,'GodownCode'
      ,'ChkPERISHABLE'
      ,'FixedPrice'
      ,'BranchCode'
      ,'WorkUser'
      ,'StockQty'
      ,'OurPrice'
      ,'AvgRate'
      ,'GodownName'
      ,'Amount'
      ,'UOM'
      ,'BasePrice'

    ];
}
