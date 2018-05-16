<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class UserExtraPic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user_extra_pics';
    protected $fillable = [
        'user_id',
        'extra_picture',
        'extra_picture_org',

    ];
    public function user()
    {
      return $this->belongsTo('App\User','user_id','id');
    }

}
