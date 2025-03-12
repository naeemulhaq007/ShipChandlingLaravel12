<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
    use HasFactory;
    protected $table="chatsuser";
    protected $primaryKey = 'id';

    public function sendMessage($message, $senderUserId)
    {
        $this->chats()->create([
            'message' => $message,
            'sender_user_id' => $senderUserId,
            'status' => 'sent', // You can set the default status
        ]);
    }

     public function chats()
    {
        return $this->hasMany('App\Models\Chats', 'chat_user_id', 'id');
    }
     public function chatsSender()
    {
        return $this->hasMany('App\Models\Chats', 'sender_user_id', 'id');
    }

    public function latestChat()
    {
        return $this->hasOne('App\Models\Chats', 'chat_user_id', 'id')->latest();
    }

    public static function getlatestChats()
    {
        // return ChatUser::with('latestChat')->get();
        $loggedInUserId = auth()->user()->UserID;

        return ChatUser::with(['latestChat' => function ($query) use ($loggedInUserId) {
            $query->where(function ($subquery) use ($loggedInUserId) {
                $subquery->where('sender_user_id', $loggedInUserId)
                    ->orWhere('chat_user_id', $loggedInUserId);
            })->latest();
        }])->get();
    }

    public static function getChats()
    {
        // return ChatUser::with('chats')->with('chatsSender')->where('sender_user_id',$this->id)->get();

          $loggedInUserId = auth()->user()->UserID;

        return ChatUser::with(['chats' => function ($query) use ($loggedInUserId) {
            $query->where(function ($subquery) use ($loggedInUserId) {
                $subquery->where('sender_user_id', $loggedInUserId)
                    ->orWhere('chat_user_id', $loggedInUserId);
            });
        }])->get();
    }


    protected $fillable = [
        'id'
      ,'full_name'
      ,'status'
      ,'nickname'
      ,'online'

    ];
}
