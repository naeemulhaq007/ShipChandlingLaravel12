<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class RFQVendorGSForEmail extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="rfqvendorgsforemail";
    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'ID'
      ,'QuoteNo'
      ,'EventNo'
      ,'CustomerRefNo'
      ,'DepartmentCode'
      ,'DepartmentName'
      ,'PortCode'
      ,'PortName'
      ,'BranchCode'
      ,'CompanyName'
      ,'CompanyAddress'
      ,'CompanyEmailAddress'
      ,'CompanyWebSite'
      ,'CompanyPhoneNo'
      ,'CompanyFaxNo'
      ,'VendorCode'
      ,'VendorName'
      ,'Address'
      ,'PhoneNo'
      ,'VendorEmail'
      ,'SendDate'
      ,'SendTime'
      ,'SendCustomerNote'
      ,'SendVendorNote'
      ,'RequiredDate'
      ,'RequiredTime'
      ,'SNO'
      ,'ProductCode'
      ,'ProductName'
      ,'Qty'
      ,'UOM'
      ,'UnitPrice'
      ,'Currency'
      ,'ETADate'
      ,'VendorRcvdPrice'
      ,'ReceivedDate'
      ,'ReceivedTime'
      ,'WorkUser'
      ,'VendorRecRemarks'
      ,'VSNNo'
      ,'PONO'


    ];
}
