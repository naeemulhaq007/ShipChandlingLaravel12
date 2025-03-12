<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class RFQModel extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="rfq";
    protected $primaryKey = 'ID';

    public $timestamps = false;

protected $fillable = [
    "ID"
    ,"EventNo"
    ,"QuoteNO"
    ,"PortName"
    ,"PortCode"
    ,"CustRefNo"
    ,"DepartmentCode"
    ,"DepartmentName"
    ,"ItemNo"
    ,"SKU"
    ,"Description"
    ,"Qty"
    ,"CustUOM"
    ,"QuotePrice"
    ,"Vendor1"
    ,"RFQ1"
    ,"RFQDate1"
    ,"Cost1"
    ,"ExtCost"
    ,"Vendor2"
    ,"RFQ2"
    ,"RFQDate2"
    ,"Cost2"
    ,"ExtCost2"
    ,"Vendor3"
    ,"RFQ3"
    ,"RFQDate3"
    ,"Cost3"
    ,"ExtCost3"
    ,"Vendor4"
    ,"RFQ4"
    ,"RFQDate4"
    ,"Cost4"
    ,"ExtCost4"
    ,"Vendor5"
    ,"RFQ5"
    ,"RFQDate5"
    ,"Cost5"
    ,"ExtCost5"
    ,"QuoteID"
    ,"VendorCode1"
    ,"VendorCode2"
    ,"VendorCode3"
    ,"VendorCode4"
    ,"VendorCode5"
    ,"IMPACode"
    ,"SNo"
    ,"BranchCode"
    ,"VendorNotes"
    ,"CustomerNotes"
    ,"ChkCompleteRFQ"
    ,"VendorNotes2"
    ,"VendorNotes3"
    ,"VendorNotes4"
    ,"VendorNotes5"
    ,"WorkUser"
    ,"WorkUser2"
    ,"WorkUser3"
    ,"WorkUser4"
    ,"WorkUser5"
    ,"PONO"
    ,"VSNNO"
    ,"VendorPartNo2"
    ,"VendorPartNo3"
    ,"VendorPartNo4"
    ,"VendorPartNo5"
];
}
