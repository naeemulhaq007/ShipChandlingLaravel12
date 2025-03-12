<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CustomerDiscount extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="customerdiscount";
    protected $primaryKey = 'ID';

    public $timestamps = false;

    public function Customer()
    {
        return $this->belongsTo(\App\Models\Customer::class);
    }

    protected $fillable = [


        'DepartmentName',
        'DepartmentCode',
        'CrNotePer',
        'InvDiscPer',
        'AVIRebatePer',
        'AgentCommPer',
        'SlsCommPer',
        'CustomerCode',
        'BranchCode',
    ];
}
