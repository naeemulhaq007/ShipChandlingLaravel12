<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class VendorDepartment extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="vendordepartment";
    protected $primaryKey = 'ID';

    public $timestamps = false;
    protected $fillable = [
        'ID'
        ,'VenderCode'
        ,'TypeCode'
        ,'BranchCode'
        ,'ChkSelect'
        ,'CommPer1'
        ,'DiscPer1'
    ];
}
