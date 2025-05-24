<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UOMModel extends Model
{
    use HasFactory;
    protected $table = "uomsetup";
    protected $primaryKey = 'UOMCode';
    public $timestamps = false;
    public $incrementing = false; 
  

    // Optional: define fillable fields
    protected $fillable = ['UOMCode', 'UOMName', 'ChkInactive', 'BranchCode'];

}