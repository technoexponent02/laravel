<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileView extends Model
{
    protected $table = 'profile_views';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'viewer_id',
        'local',
        'view_time',
        'show_viewer',
        'audio_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function User()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function viewer()
    {
        return $this->belongsTo('App\User','viewer_id','id');
    }
}
