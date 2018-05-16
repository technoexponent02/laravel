<?php
/**
 * Created by PhpStorm.
 * User: saibal
 * Date: 28/7/16
 * Time: 4:51 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Membership extends Model
{
    use Translatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['membership_id', 'name','no_of_month' , 'price' , 'cost_price', 'discount_percentage', 'promotional_text'];
    /**
     * The attributes that are mass translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];

    public function membershipFeatures()
    {
        return $this->hasMany('App\MembershipFeature','membership_id','id');
    }
    public function membership_users()
    {
        return $this->hasMany('App\UserMembership','membership_id','id');
    }
}
