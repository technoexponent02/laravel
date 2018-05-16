<?php
/**
 * Created by Pritam.
 * User: Pritam
 * Date: 17-01-2017
 * Time: 05:51 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class CcbillTransaction extends Model
{
     protected $table = 'ccbill_transactions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'user_credit_id', 'accountingCurrency', 'accountingCurrencyCode', 'accountingInitialPrice', 'address1', 'billedCurrency', 'billedCurrencyCode', 'billedInitialPrice', 'billedRecurringPrice', 'cardType', 'city', 'country', 'email', 'firstName', 'lastName', 'flexId', 'ipAddress', 'paymentAccount', 'paymentType', 'postalCode', 'priceDescription', 'referringUrl', 'state', 'subscriptionCurrency', 'subscriptionCurrencyCode', 'subscriptionId', 'subscriptionInitialPrice', 'subscriptionTypeId', 'subscription_timestamp', 'transactionId', 'eventType', 'eventGroupType'];
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function userCredit()
    {
        return $this->belongsTo('App\UserCredit','user_credit_id','id');
    }
}
