<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    use HasFactory;
    protected $table="chats";
    protected $primaryKey = 'id';

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function user_info(){
        return $this->hasOne('App\Models\ChatUser','id','chat_user_id');
    }
    public function sender()
    {
        return $this->belongsTo('App\Models\ChatUser', 'sender_user_id', 'id');
    }

    protected $fillable = [
        'id'
      ,'chat_user_id'
      ,'sender_user_id'
      ,'message'
      ,'status'


    ];
}
