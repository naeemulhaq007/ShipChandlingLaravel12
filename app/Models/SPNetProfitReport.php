<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SPNetProfitReport extends Model
{
    protected $table = 'SPNetProfitReport';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function execute($branchCode, $qry)
    {
        $qry = str_replace("'", "''", $qry);

        $result = DB::select("
            EXEC InsertSPNetProfitReportResult @BranchCode = ?, @Qry = ?
        ", [$branchCode, $qry]);

        return $result;
    }
}
