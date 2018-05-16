<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatmessage extends Model
{
    protected $table = 'chat_messages';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'from_user_country_id',
        'to_user_country_id',
        'from_user_type',
        'to_user_type',
        'message',
        'from_user_view_status',
        'to_user_view_status',
        'audio_status',
        'type',
        'file_name',
        'file_ext',
        'is_flirt',
        'is_bot'
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
    public function fromUserCountry()
    {
        return $this->belongsTo('App\Country','from_user_country_id','idCountry');
    }
    public function toUserCountry()
    {
        return $this->belongsTo('App\Country','to_user_country_id','idCountry');
    }
    /* public function fromUserChat()
    {
        return $this->belongsTo('App\Chatuser','from_user_id','from_user_id');
    }
    public function toUserChat()
    {
        return $this->belongsTo('App\Chatuser','to_user_id','to_user_id');
    } */
}
