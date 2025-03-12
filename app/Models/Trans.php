<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Trans extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="trans";
    protected $primaryKey = 'id';

    public $timestamps = false;
    public function scopeForDateRange($query, $dateFrom, $dateTo)
    {
        return $query->whereBetween('date', [$dateFrom, $dateTo]);
    }

    public function scopeForBranch($query, $branchCode)
    {
        return $query->where('BranchCode', $branchCode);
    }

    public function scopeForActCode($query, $actCode)
    {
        return $query->where('ActCode', 'like', $actCode.'.%');
    }

    public function scopeForSearchAc($query, $searchAc)
    {
        return $query->where('AcName3', 'like', '%'.$searchAc.'%');
    }
//     protected $fillable = [
//         'TransType'
//       ,'Vnon'
//       ,'Vnoc'
//       ,'Date'
//       ,'AcCode3'
//       ,'Des'
//       ,'TransAmt'
//       ,'ActCode'
//       ,'ChqNo'
//       ,'ChqDate'
//       ,'ActCode2'
//       ,'ChkAdvance'
//       ,'WorkUser'
//       ,'BranchCode'
//       ,'Currency'
//       ,'MonthName'
//       ,'YearName'
//       ,'ClientOrderNo'
//       ,'EntryDate'
//       ,'POType'
//       ,'PayType'
//       ,'ChkRecon'
//       ,'ClearingDate'
//       ,'ReconWorkUser'
//       ,'ReconDate'
//       ,'ReconTime'
//       ,'GodownCode'

// ];
}
