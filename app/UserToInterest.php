<?php
/**
 * Created by PhpStorm.
 * User: saibal
 * Date: 28/7/16
 * Time: 4:51 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserToInterest extends Model
{
     protected $table = 'user_to_interests';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'interest_id'];
    
    public function interest()
    {
        return $this->belongsTo('App\Whatturn','interest_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
