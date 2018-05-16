<?php 
namespace App\Http\Controllers\Api;

use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ParentApiController;
use Location;
use Auth;

use App\Country;
use App\City;
use App\CountryLanguage;

class ApiController extends ParentApiController {

    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function getLanguage(Request $request)
    {
        $languageCountry = $this->getCountryByID($this->langCountryId);
        //dd($languageCountry);
        $response['countryWithLang'] = array();
        if($languageCountry)
        {
            $response['countryWithLang']['id'] = $languageCountry->idCountry;
            $response['countryWithLang']['countryCode'] = $languageCountry->countryCode;
            $response['countryWithLang']['countryName'] = $languageCountry->countryName;
            $response['countryWithLang']['currencyCode'] = $languageCountry->currencyCode;
            $response['countryWithLang']['languageName'] = $languageCountry->languageName;
            $response['countryWithLang']['locale'] = $languageCountry->locale;
        }
        
        return response()->json($response, 201);
    }
    
    public function getCountryUsingIP(Request $request)
    {
        $response['opstatus'] = 0;
        $searchip = $request->input('ip') ? trim($request->input('ip')) : '';
        $countryDetByIP = $this->getCountryByIP($searchip);
        //dd($countryDetByIP);
        if($countryDetByIP->countryCode)
        {
            $response['opstatus'] = 1;
            $response['countryDet'] = $countryDetByIP;
        }
        else
        {
            $response['opmsg'] = 'Invali IP!';
        }
        return response()->json($response, 201);
    }

    public function countryList(Request $request)
    {
        $allCountry = \DB::select("
            SELECT c.idCountry, c.countryCode, c.countryName, c.currencyCode, l.name as languageName, l.name, l.locale 
            FROM country_language cl
            LEFT JOIN countries c ON cl.country_id=c.idCountry
            LEFT JOIN languages l ON cl.language_id=l.id
            ORDER BY c.countryName ASC"
        );
        //dd($allCountry);
        $countryArray = array();
        if(count($allCountry))
        {
            $counter = 0;
            foreach($allCountry as $ckey => $cvalue)
            {
                $countryArray[$counter]['id'] = $cvalue->idCountry;
                $countryArray[$counter]['countryCode'] = $cvalue->countryCode;
                $countryArray[$counter]['countryName'] = $cvalue->countryName;
                $countryArray[$counter]['currencyCode'] = $cvalue->currencyCode;
                $countryArray[$counter]['languageName'] = $cvalue->languageName;
                $countryArray[$counter]['locale'] = $cvalue->locale;
                $countryArray[$counter]['isSelected'] = $cvalue->idCountry==$this->langCountryId ? true : false;
                $counter++;
            }
        }
        $response['countries'] = $countryArray;
        
        return response()->json($response, 201);
    }
}
