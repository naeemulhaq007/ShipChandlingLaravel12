<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CompanySetup extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="companysetup";
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID'
      ,'CompanyName'
      ,'CompanyAddress'
      ,'PhoneNo'
      ,'EmailAddress'
      ,'FaxNo'
      ,'WebsiteAddress'
      ,'BranchCode'

    ];
}
