<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryLanguage extends Model
{
    protected $table = 'country_language';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'language_id'
    ];


    public function country()
    {
      return $this->belongsTo('App\Country','country_id','idCountry');
    }

    public function language()
    {
      return $this->belongsTo('App\Language','language_id','id');
    }

  
}
