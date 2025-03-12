<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class CustomerContacts extends Model

{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="customercontacts";
    protected $primaryKey = 'ID';

    public $timestamps = false;

    public function setIdentityInsert()
    {
        DB::statement('SET IDENTITY_INSERT CustomerContacts ON');
    }

    public function unsetIdentityInsert()
    {
        DB::statement('SET IDENTITY_INSERT CustomerContacts OFF');
    }

    protected $fillable = [


        "ID"
      ,"CustomerCode"
      ,"Title"
      ,"CustName"
      ,"DepartmentName"
      ,"Phone"
      ,"Cell"
      ,"Fax"
      ,"Email"
      ,"Notes"
      ,"IMONo"
    ];
}
