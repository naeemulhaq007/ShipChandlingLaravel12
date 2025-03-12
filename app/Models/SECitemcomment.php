<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SECitemcomment extends Model
{
    use HasFactory;
    protected $connection = 'secsqlsrv';

    protected $table="ItemSetupNewComments";
    protected $primaryKey = 'ItemCode';

    public $timestamps = false;

    public function qryitem(){
        return $this->hasOne('App\Models\SECQryitemsetup','ItemCode','ItemCode');
    }
    protected $fillable=[
    'ItemCode'
      ,'Comments'
      ,'BranchCode'
      ,'WorkUser'
      ,'LastDate'
    ];
}
