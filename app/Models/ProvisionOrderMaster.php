<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvisionOrderMaster extends Model
{
    use HasFactory;
    protected $connection = 'secsqlsrv';

    protected $table="order_master";
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id'
        ,'full_name'
        ,'vessel_name'
        ,'vessel_imo'
        ,'customer_name'
        ,'branchcode'
        ,'email'
        ,'reqdate'
        ,'message'
        ,'shippingport'
        ,'ContactNo'
        ,'CustomerRefNo'
    ];
}
