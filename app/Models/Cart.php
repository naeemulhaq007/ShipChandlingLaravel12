<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table="Cart";
    protected $connection = 'secsqlsrv';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id'
      ,'itemcode'
      ,'quantity'
      ,'department'
      ,'category'
      ,'session'
      ,'categorycode'
    ];
}
