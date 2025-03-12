<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class TempIncome extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $connection = 'secsqlsrv';

    protected $table="TempIncome";
    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'ID'
        ,'TitleName'
        ,'AccountDes'
        ,'Debit'
        ,'Credit'
        ,'Balance'
        ,'ActCode'
        ,'WorkUser'
        ,'BranchCode'
        ,'Currency'
        ,'BranchName'
        ,'GroupSort'
        ,'GroupName'
        ,'Per'
        ,'ShowColor'
        ,'TotalAmt'
        ,'DateFrom'
        ,'DateTo'


    ];
}
