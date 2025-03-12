<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class Typesetup extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="typesetup";
    protected $primaryKey = 'TypeCode';

    public $timestamps = false;

    protected $fillable = [
        'TypeCode'
        ,'TypeName'
        ,'BranchCode'
        ,'ChkIMPA'
        ,'ChkShowKG'
        ,'ChkDeckEngin'
        ,'ChkProvBond'

    ];
}
