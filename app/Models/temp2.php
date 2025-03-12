<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temp2 extends Model
{
    use HasFactory;
    protected $table="temp2";
    protected $primaryKey = 'ActCode';

    public $timestamps = false;

    protected $fillable = [
        'ActCode'
      ,'ActName'
      ,'Debit'
      ,'Credit'
      ,'Mainac'
      ,'DateFrom'
      ,'DateTo'
      ,'Drop1'
      ,'Crop'
      ,'Drtr'
      ,'Crtr'
      ,'Drcl'
      ,'Crcl'
      ,'Head'
      ,'CalcRate'
      ,'Amount'
      ,'TitleLevel1'
      ,'TitleLevel2'
      ,'TitleLevel3'
      ,'TitleLevel4'
      ,'Acode1'
      ,'Acode2'
      ,'Acode3'
      ,'Acode4'
      ,'Acode5'
      ,'Acode6'
      ,'Acode7'
      ,'Acode8'
      ,'Level'
      ,'BranchCode'
      ,'WorkUser'
      ,'N60To90'
      ,'Above90'
    ];
}
