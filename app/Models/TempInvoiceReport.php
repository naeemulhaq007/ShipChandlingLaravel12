<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class TempInvoiceReport extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="tempinvoicereport";
    protected $primaryKey = 'InvNo';

    public $timestamps = false;

    protected $fillable = [
        'InvNo'
        ,'Invdate'
        ,'VesselName'
        ,'CustomerName'
        ,'DepartmentName'
        ,'Terms'
        ,'SoldQty'
        ,'InvDiscPer'
        ,'InvDiscAmt'
        ,'InvoiceAmt'
        ,'CrNoteAmt'
        ,'WorkUser'
        ,'BranchCode'
        ,'PurchaseOrderNo'
        ,'GrossSaleAmt'

    ];



}
