<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
        'locale',
        'weight',
        'fallback_locale',
    ];

    /**
     *
     *
     * @param $q
     * @return mixed
     */
    public function scopeCurrent($q)
    {
        return $q->where('locale', app()->getLocale())->first();
    }
}
