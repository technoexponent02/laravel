<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'notify_type_id',
        'from_user_id',
        'to_user_id',
        'type',
        'view_status',
        'audio_status',
        'admin_view'

    ];
    public function fromUser()
    {
      return $this->belongsTo('App\User','from_user_id','id');
    }

    public function toUser()
    {
      return $this->belongsTo('App\User','to_user_id','id');
    }

}
