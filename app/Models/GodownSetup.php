<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class GodownSetup extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="godownsetup";
    protected $primaryKey = 'Id';

    public $timestamps = false;

protected $fillable = [
       'Id'
      ,'GodownCode'
      ,'GodownName'
      ,'BranchCode'
      ,'PrinterName'
      ,'StockCode'
      ,'StockName'
      ,'Prefix'
      ,'ChkNotShow'
      ,'stateCode'
];

}
