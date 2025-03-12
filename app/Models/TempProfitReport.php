<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class TempProfitReport extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="tempprofitreport";
    protected $primaryKey = 'ID';

    public $timestamps = false;

}
