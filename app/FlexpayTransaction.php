<?php
/**
 * Created by Pritam.
 * User: Pritam
 * Date: 17-01-2017
 * Time: 05:51 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class FlexpayTransaction extends Model
{
     protected $table = 'flexpay_transactions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'user_credit_id', 'event', 'referenceID', 'paymentMethod', 'priceAmount', 'priceCurrency', 'period', 'trialAmount', 'trialPeriod', 'nextChargeOn', 'subscriptionPhase', 'cancelledBy', 'uncancelledBy', 'saleID', 'precededBySaleID', 'shopID', 'transactionID', 'parentID', 'type', 'subscriptionType', 'signature', 'truncatedPAN', 'CCBrand'];
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    /*public function userCredit()
    {
        return $this->belongsTo('App\UserCredit','user_credit_id','id');
    }*/

    public function userMembership()
    {
        return $this->belongsTo('App\UserMembership','user_credit_id','id');
    }
}
