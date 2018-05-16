<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userlogin extends Model
{
    protected $table = 'userlogins';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'lastlogintime',
        'ipaddress',
        'login_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
