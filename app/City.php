<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'country_id',
        'city_name',
        'city_status'
    ];

    public function country()
    {
        return $this->belongsTo('App\Country','country_id','idCountry');
    }
}
