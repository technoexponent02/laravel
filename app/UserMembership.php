<?php
/**
 * Created by PhpStorm.
 * User: saibal
 * Date: 28/7/16
 * Time: 4:51 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMembership extends Model
{
     protected $table = 'user_memberships';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'membership_id', 'purchase_date', 'price', 'start_time', 'end_time', 'membership_status', 'is_running'];
    
    public function membership()
    {
        return $this->belongsTo('App\Membership','membership_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
