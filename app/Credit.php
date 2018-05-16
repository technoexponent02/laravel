<?php
/**
 * Created by Pritam.
 * User: Pritam
 * Date: 17-01-2017
 * Time: 02:43 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Credit extends Model
{
    use Translatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['credit_id', 'name', 'ccbill_subscriptionTypeId', 'ccbil_formUrl', 'is_free', 'no_of_credits' , 'price', 'cost_price', 'price_order', 'most_popular'];
    /**
     * The attributes that are mass translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];

    /*public function membershipFeatures()
    {
        return $this->hasMany('App\MembershipFeature','membership_id','id');
    }
    public function membership_users()
    {
        return $this->hasMany('App\UserMembership','membership_id','id');
    }*/
}
