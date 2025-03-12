<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class termssetup extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="termssetup";
    protected $primaryKey = 'TermsCode';

    public $timestamps = false;

    protected $fillable = [
        'TermsCode',
        'Terms',
        'BranchCode',
        'Days',


    ];
}
