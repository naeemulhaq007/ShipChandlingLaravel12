<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class Vessel extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="vesselsetup";
    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
          'CustomerCode'
      ,  'IMONo'
      ,  'VesselName'
      ,  'VesselType'
      ,  'VCallSign'
      ,  'Email'
      ,  'PhoneNo'
      ,  'IMONO2'
      ,  'SuperintendentName'
      ,  'SuperintendentEmail'
      ,  'SuperintendentPhone'
      ,  'superintendentDate'
      ,  'Captainname'
      ,  'CaptainEmail'
      ,  'CaprtainPhone'
      ,  'CaptainDate'
      ,  'ContactPerName'
      ,  'ContactPerEmail'
      ,  'ContactPerPhone'
      ,  'ContactPerDate'
      ,  'VNotes'
      ,  'SalesManCommPer'
      ,  'SalesManName'
      ,  'SalesManCode'
      ,  'SalesManActCode'
      ,  'SalesManNotes'
      ,

    ];
}
