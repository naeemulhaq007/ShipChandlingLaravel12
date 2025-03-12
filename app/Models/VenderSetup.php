<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class VenderSetup extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="vendersetup";
    protected $primaryKey = 'VenderCode';

    public $timestamps = false;

protected $fillable = [
    "VenderCode"
      ,"VenderName"
      ,"Address"
      ,"CallSign"
      ,"PhoneNo"
      ,"FaxNo"
      ,"EmailAddress"
      ,"WebAddress"
      ,"Status"
      ,"ChkInactive"
      ,"BranchCode"
      ,"DepartmentCode"
      ,"DiscPer"
      ,"CommPer"
      ,"Country"
      ,"Buyer"
      ,"Items"
      ,"CrLimit"
      ,"ContactPerson"
      ,"YourCode"
      ,"ActCode"
      ,"ChkStockPurchase"
      ,"Date"
      ,"ACT"
      ,"APP"
      ,"City"
      ,"VSite"
      ,"VPlat"
      ,"Fax"
      ,"OnlyCity"
      ,"State"
      ,"ZIP"
      ,"Terms"
      ,"ShipVia"
      ,"FOB"
      ,"BankName"
      ,"AccNo"
      ,"ABARouting"
      ,"SwiftCode"
      ,"ChkNoCost"
      ,"WorkUser"
      ,"LastDate"
      ,"PDFPath"
      ,"AssignUser"
      ,"ApprovedBy"
      ,"ChkAllowZeroRatedStock"
];
}
