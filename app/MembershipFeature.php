<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipFeature extends Model
{
    protected $fillable = [
        'membership_id',
        'site_feature_id',
        'site_feature_value',
        'is_unlimited'
    ];
    public function membership()
    {
        return $this->belongsTo('App\Membership','membership_id','id');
    }
    public function site_feature()
    {
        return $this->belongsTo('App\Sitefeature','site_feature_id','id');
    }

}
