<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatuser extends Model
{
    protected $table = 'chatusers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'send_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function fromUser()
    {
        return $this->belongsTo('App\User','from_user_id','id');
    }
    public function toUser()
    {
        return $this->belongsTo('App\User','to_user_id','id');
    }
    /* public function fromUserMessage()
    {
        return $this->hasMany('App\Chatmessage','from_user_id','to_user_id');
    }
    public function toUserMessage()
    {
        return $this->hasMany('App\Chatmessage','to_user_id','from_user_id');
    } */
}
