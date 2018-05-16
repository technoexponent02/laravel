<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class UserImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'prifile_picture',
        'prifile_picture_org',
        'is_current'

    ];
    public function user()
    {
      return $this->belongsTo('App\User','user_id','id');
    }

}
