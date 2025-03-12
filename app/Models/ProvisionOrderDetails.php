<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvisionOrderDetails extends Model
{
    use HasFactory;
    protected $connection = 'secsqlsrv';

    protected $table="order_details";
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id'
      ,'order_id'
      ,'itemcode'
      ,'quantity'
      ,'branchcode'
      ,'orderddate'
      ,'department'
      ,'packing'
      ,'customercomment'
    ];
}
