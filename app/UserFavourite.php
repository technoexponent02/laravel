<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFavourite extends Model
{
    protected $table = 'user_favourites';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id',
        'favourite_id'
    ];


    public function favourite_to()
    {
      return $this->belongsTo('App\User','user_id','id');
    }

    public function favourite_by()
    {
      return $this->belongsTo('App\User','favourite_id','id');
    }

  
}
