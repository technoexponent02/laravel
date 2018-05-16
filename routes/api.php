<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


define('DEFAULT_API_VERSION', '/');

Route::group(['namespace' => 'Api', 'prefix' => DEFAULT_API_VERSION], function() {
	/*************Unauthenticated routes*****************/
	Route::get('testapi', 'UserController@test');
	Route::post('register','UserController@register');
	Route::post('login','UserController@authenticate');

	Route::get('get_language','ApiController@getLanguage');
	Route::get('getcountryusingip','ApiController@getCountryUsingIP');
	Route::get('getcountrylist','ApiController@countryList');


	/*************Authenticated routes*****************/
	Route::post('authuser','UserController@authUser');
});