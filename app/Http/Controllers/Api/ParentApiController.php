<?php 
namespace App\Http\Controllers\Api;

use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Location;
use Auth;

use App\Country;
use App\City;
use App\CountryLanguage;

class ParentApiController extends Controller {
    protected $langCountryId;
    public function __construct(Request $request)
    {
        if(Auth::check())
        {
            $this->langCountryId = Auth::user()->country_id;
        }
        else
        {
            $ip = $request->header('ip');
            $this->langCountryId = $this->getSelectedCountryAndLanguage($ip);
        }
        //dd($this->langCountryId);
        //exit;
    }

    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    public function getCountryByIP($ip='')
    {
        if($ip)
        {
            $data = \Location::get($ip);
            return $data;
        }
    }

    public function getCountryByID($country_id='')
    {
        if($country_id)
        {
            $country_data = \DB::select("
                        SELECT c.idCountry, c.countryCode, c.countryName, c.currencyCode, l.name as languageName, l.name, l.locale 
                        FROM country_language cl
                        LEFT JOIN countries c ON cl.country_id=c.idCountry
                        LEFT JOIN languages l ON cl.language_id=l.id
                        WHERE c.idCountry='".$country_id."'
                        ORDER BY c.countryName ASC"
                    );
            //dd($country_data);
            return $country_data ? $country_data[0]:'';
        }
    }

    public function getSelectedCountryAndLanguage($ip='')
    {
        if($ip)
        {
            $data = \Location::get($ip);
            if($data->countryCode)
            {
                $allCountry = \DB::select("
                    SELECT c.idCountry, c.countryCode, c.countryName, c.currencyCode, l.name as languageName, l.name, l.locale 
                    FROM country_language cl
                    LEFT JOIN countries c ON cl.country_id=c.idCountry
                    LEFT JOIN languages l ON cl.language_id=l.id
                    WHERE c.countryCode='".$data->countryCode."'
                    ORDER BY c.countryName ASC"
                );
                //dd($allCountry);
                if(count($allCountry) > 0)
                {
                    return $allCountry[0]->idCountry;
                }
                else
                {
                    return config('app.DEFAULT_COUNTRY_ID');
                }
                //dd($allCountry);
            }
        }
    }
}
