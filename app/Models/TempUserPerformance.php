<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class TempUserPerformance extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tempuserperformance';


        public $timestamps = false;

        protected $fillable = [
            'WorkSellPricied'
            ,'QDate'
            ,'QuoteNo'
            ,'EventNo'
            ,'FlipOrderNo'
            ,'VSNNo'
            ,'QuoteAmount'
            ,'OrderAmount'
            ,'Success'
            ,'Department'
            ,'Warehouse'
            ,'CustomerName'
            ,'Vessel'
            ,'LineQuote'
            ,'LineOrder'
            ,'GPPer'
    ];
}
