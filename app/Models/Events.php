<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Events extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "eventinvoice";
    protected $primaryKey = 'EventNo';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'EventNo',
        'GeneralVesselNote',
        'ETA',
        'Contact',
        'Phone',
        'Cell',
        'BidDUeDate',
        'DueTime',
        'ShippingPort',
        'Note',
        'Name',
        'Email',
        'Fax',
        'Status',
        'ReturnVia',
        'Priority',
        'Competition',
        'CustomerCode',
        'IMONo',
        'Department',
        'CustomerRef',
        'BidDUeDate2',
        'ReturnVia2',
        'EstLineQuote',
        'DueTme2',
        'EventCreatedUser',
        'EventCreatedDate',
        'EventCreatedTime',
        'BranchCode',
        'ContactID',
        'SendProductListDate',
        'PVID',
        'CustomerName',
        'VesselName',
        'GodownCode',
        'GodownName',
        'CusCode',
        'CustomerActCode'
    ];

    public function quotes()
    {
        return $this->hasMany('App\Models\Quote', 'EventNo', 'EventNo');
    }
}
