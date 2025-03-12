<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class ShipingPortSetup extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table="shipingportsetup";
    protected $primaryKey = 'ID';

    public $timestamps = false;
    protected $fillable = [
    'ID'
    ,'PortCode'
    ,'PortName'
    ,'BranchCode'
    ];
}
