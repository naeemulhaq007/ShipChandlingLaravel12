<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class AgentSetup extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="agentcommsetup";
    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'ID',
        'AgentCode',
        'ActCode',
        'AgentName',
        'Address',
        'CallSign',
        'PhoneNo',
        'FaxNo',
        'EmailAddress',
        'WebAddress',
        'BContactPerson',
        'BillingAddress',
        'BTelephoneNo',
        'BFaxNo',
        'BEmailAddress',
        'BWeb',
        'Status',
        'ChkInactive',
        'CreditLimit',
        'Country',
        'BranchCode',
        'CusCode',
        'Terms',
        'EventQuateCharges',
        'City',
        'State',
        'Zip',



    ];
}
