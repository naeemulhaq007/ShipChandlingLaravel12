<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SECQryitemsetup extends Model
{
    use HasFactory;
    protected $connection = 'secsqlsrv';

    protected $table="QryItemSetupNew";
    protected $primaryKey = 'ID';

    public $timestamps = false;
    protected $fillable=[
        'TypeName'
        ,'CategoryName'
        ,'ID'
        ,'ItemCode'
        ,'Date'
        ,'IMPACode'
        ,'ItemName'
        ,'DepartmentCode'
        ,'CategoryCode'
        ,'BrandCode'
        ,'ClassCode'
        ,'UOM'
        ,'VendorPrice'
        ,'Currency'
        ,'SaleRate'
        ,'WorkUser'
        ,'BranchCode'
        ,'ReorderLevel'
        ,'ReorderQty'
        ,'Type'
        ,'AvgRate'
        ,'EntryDate'
        ,'ChkInactive'
        ,'ChkProvBond'
        ,'ChkDeckEngin'
    ];

    public function getcomments(){
        return $this->hasMany('App\Models\SECitemcomment','ItemCode','ItemCode');
    }
    public static function getAlldata(){
        return SECQryitemsetup::with('getcomments');
    }
}
