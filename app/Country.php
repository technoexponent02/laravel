<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';
    protected $primaryKey='idCountry';
    protected $fillable = [
        'countryName',
        'countryCode',
        'currencyCode',
      ];
    public function users()
    {
        return $this->hasMany('App\User','country_id','idCountry');
    }
    public function City()
    {
        return $this->hasMany('App\City','country_id','idCountry')->orderBy('city_name', 'asc');
    }
    public function countryLanguage()
    {
        return $this->hasOne('App\CountryLanguage','country_id','idCountry');
    }
}
