<?php
/**
 * Created by Pritam.
 * User: Pritam
 * Date: 17-01-2017
 * Time: 05:51 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCredit extends Model
{
     protected $table = 'user_credits';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'action_id', 'action_type', 'date_time', 'price', 'transaction_type', 'credit_amount', 'user_balance', 'payment_status'];
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
