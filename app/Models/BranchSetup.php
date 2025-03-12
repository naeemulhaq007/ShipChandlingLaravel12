<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class BranchSetup extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="branchsetup";
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'BranchCode',
        'BranchName',
        'CityName',
        'pic',
        'Inactive',
        'Currency',
        'Email',
        'Password',
        'SMTP',
        'USDRate',
        'GSTPer',


    ];



}
