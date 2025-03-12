<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QryOrderMaster extends Model
{
    protected $table = 'QryOrderMaster';

    public function orderDetails()
    {
        return $this->leftJoin('orderdetail as B', function ($join) {
            $join->on('QryOrderMaster.PONo', '=', 'B.PONO')
                 ->on('QryOrderMaster.VSNNo', '=', 'B.VSNNo')
                 ->on('QryOrderMaster.BranchCode', '=', 'B.BranchCode');
        })
        ->select(
            'QryOrderMaster.*',
            'B.ORDERQTY',
            'B.RecQty',
            'B.DeliveredQty',
            'B.ReturnQty',
            'B.MissingQty',
            'B.SoldQty',
            'B.PullQty',
            'B.CancelQty',
            DB::raw("IFNULL(B.Hasmate, '') as Hasmate")
        );
    }
}
