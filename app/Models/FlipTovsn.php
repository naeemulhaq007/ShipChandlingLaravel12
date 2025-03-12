<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class FlipTovsn extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="fliptovsn";
    protected $primaryKey = 'VSNNo';

    public $timestamps = false;

protected $fillable = [
    "ID"
      ,"VSNNo"
      ,"EventNo"
      ,"QuoteNo"
      ,"OrderDate"
      ,"DeliveryDate"
      ,"Time"
      ,"Location"
      ,"Port"
      ,"Agency"
      ,"Agent"
      ,"Des"
      ,"Confirmation"
      ,"AvailCredit"
      ,"FlipAmount"
      ,"NoOfQuote"
      ,"TotalFlip"
      ,"BranchCode"
      ,"DepartmentName"
      ,"CustomerName"
      ,"VesselName"
      ,"Comments"
      ,"WorkUser"
      ,"Status"
      ,"GeneralVesselNote"
      ,"ETA"
      ,"Contact"
      ,"ContactID"
      ,"Phone"
      ,"Cell"
      ,"BidDUeDate"
      ,"DueTime"
      ,"ShippingPort"
      ,"Note"
      ,"Name"
      ,"Email"
      ,"Fax"
      ,"ReturnVia"
      ,"Priority"
      ,"CustomerCode"
      ,"IMONo"
      ,"Department"
      ,"CustomerRef"
      ,"BidDUeDate2"
      ,"ReturnVia2"
      ,"EstLineQuote"
      ,"DueTme2"
      ,"EventCreatedUser"
      ,"EventCreatedDate"
      ,"EventCreatedTime"
      ,"PVID"
      ,"GodownCode"
      ,"GodownName"
      ,"AgentCPCode"
      ,"AgentCPName"
      ,"AgentCode"
      ,"WarehouseComments"
      ,"TruckName"

];
}

