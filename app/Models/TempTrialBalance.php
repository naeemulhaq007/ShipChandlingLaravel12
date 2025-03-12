<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class TempTrialBalance extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'temptrialbalance';
    protected $primaryKey = 'id';

        public $timestamps = false;

        protected $fillable = [
        'ActCode'
        ,'AcName3'
        ,'Debit'
        ,'Credit'
        ,'AcCode1'
        ,'AcName1'
        ,'AcCode2'
        ,'AcName2'
        ,'BranchCode'
        ,'Currency'
        ,'WorkUser'
        ,'TitleLevel3'
        ,'TitleLevel4'
        ,'TitleLevel5'
        ,'AcLevel'
        ,'Acode3'
        ,'Acode4'
        ,'Acode5'
        ,'HideAc'
    ];
}
