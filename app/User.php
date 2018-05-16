<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Membership;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'dob',
        'gender',
        'seeking_for',
        'country_id',
        'city_id',
        'user_type',
        'ip_address',
        'confirmation_code',
        'status',
        'relationship_status',
        'relationshipstatuses',
        'personalities',
        'ethnicities',
        'religions',
        'children',
        'haircolors',
        'heightselected',
        'height',
        'appearances',
        'eyecolors',
        'weightselected',
        'weight',
        'bodytypes',
        'starsigns',
        'smokinghabits',
        'drinkinghabits',
        'bestfeatures',
        'bodyarts',
        'whatturns',
        'sexualorientations',
        'favouritepositions',
        'favoritetoys',
        'sexualdrives',
        'aboutme',
        'prifile_picture',
        'prifile_picture_org',
        'is_fake',
        'search_address',
        'formatted_address',
        'lat',
        'lng',
        'enable_bot_msg',
        'count_bot_msg',
        'message_notification',
        'flirt_notification',
        'profile_view_notification',
        'favourite_notification',
        'who_is_online_notification',
        'info_membership_notification',
        'online_in_webcamp_notification',
        'admin_update_notification',
        'daily_email_notification',
        'newsletter_notification',
        'credit_balance',
        'is_online',
        'sticky_notes',
        'affiliate_id',
        'affiliate_ref_ids',
        'is_fake_email',
        'is_success_reg_popup',
        'subscription_date',
        'subscription_end_date',
        'msg_not_lobby_count',
        'new_member_view_count'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userImages()
    {
        return $this->hasMany('App\UserImage','user_id','id');
    }

    public function personality()
    {
        return $this->belongsTo('App\Personality','personalities','id');
    }

    public function relationshipstatus()
    {
        return $this->belongsTo('App\Relationshipstatus','relationshipstatuses','id');
    }

    public function ethnicity()
    {
        return $this->belongsTo('App\Ethnicity','ethnicities','id');
    }

    public function religion()
    {
        return $this->belongsTo('App\Religion','religions','id');
    }

    public function haircolor()
    {
        return $this->belongsTo('App\Haircolor','haircolors','id');
    }

    public function appearance()
    {
        return $this->belongsTo('App\Appearance','appearances','id');
    }

    public function eyecolor()
    {
        return $this->belongsTo('App\Eyecolor','eyecolors','id');
    }

    public function bodytype()
    {
        return $this->belongsTo('App\Bodytype','bodytypes','id');
    }

    public function starsign()
    {
        return $this->belongsTo('App\Starsign','starsigns','id');
    }

    public function smokinghabit()
    {
        return $this->belongsTo('App\Smokinghabit','smokinghabits','id');
    }

    public function drinkinghabit()
    {
        return $this->belongsTo('App\Drinkinghabit','drinkinghabits','id');
    }

    public function bestfeature()
    {
        return $this->belongsTo('App\Bestfeature','bestfeatures','id');
    }

    public function bodyart()
    {
        return $this->belongsTo('App\Bodyart','bodyarts','id');
    }

    public function whatturn()
    {
        return $this->belongsTo('App\Whatturn','whatturns','id');
    }

    public function sexualorientation()
    {
        return $this->belongsTo('App\Sexualorientation','sexualorientations','id');
    }

    public function favouriteposition()
    {
        return $this->belongsTo('App\Favouriteposition','favouritepositions','id');
    }

    public function favoritetoy()
    {
        return $this->belongsTo('App\Favoritetoy','favoritetoys','id');
    }

    public function sexualdrive()
    {
        return $this->belongsTo('App\Sexualdrive','sexualdrives','id');
    }

    public function user_favourites()
    {
      return $this->hasMany('App\UserFavourite','user_id','id');
    }

    public function user_favourite($favourite_id)
    {
      return $this->hasMany('App\UserFavourite','user_id','id')->where('favourite_id',$favourite_id);
    }

    public function user_favourite_details($favourite_id)
    {
      return User::find($favourite_id);
    }

    public function user_country()
    {
        return $this->belongsTo('App\Country','country_id','idCountry');
    }

    public function user_city()
    {
        return $this->belongsTo('App\City','city_id','id');
    }

    // this is a recommended way to declare event handlers
   protected static function boot() {
       parent::boot();
       static::deleting(function($user) { // before delete() method call this
            $user->userImages()->delete();
            // do the rest of the cleanup...
       });
   }

   public function userLogin()
    {
      return $this->hasOne('App\Userlogin','user_id','id');
    }

    public function chatFromUsers()
    {
        return $this->hasMany('App\Chatuser','from_user_id','id');
    }

    public function chatToUsers()
    {
        return $this->hasMany('App\Chatuser','to_user_id','id');
    }

    public function chatFromUserMessages()
    {
        return $this->hasMany('App\Chatmessage','from_user_id','id');
    }

    public function chatToUserMessages()
    {
        return $this->hasMany('App\Chatmessage','to_user_id','id');
    }

    public function profileView()
    {
        return $this->hasMany('App\ProfileView','user_id','id');
    }

    public function viewers()
    {
        return $this->hasMany('App\ProfileView','viewer_id','id');
    }

    public function user_membership_all()
    {
        return $this->hasMany('App\UserMembership','user_id','id');
    }

    public function user_membership_active()
    {
        return $this->hasOne('App\UserMembership','user_id','id')->where([
                                                                ['membership_status','=',1],
                                                                ['payment_status', '=', 'Y']
                                                            ]);
    }

    public function toInterest()
    {
        return $this->hasMany('App\UserToInterest','user_id','id');
    }

    public function user_credit_all()
    {
        return $this->hasMany('App\UserCredit','user_id','id');
    }

    /***For credit****/
    public function canSendMessage()
    {
        $credits_per_message = app()->settings->credits_per_message;
        if($this->user_type == 1 && $this->credit_balance < $credits_per_message)
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }

    public function canSendFlirt()
    {
        $credits_per_flirt = app()->settings->credits_per_flirt;
        if($this->user_type == 1 && $this->credit_balance < $credits_per_flirt)
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }
    /***For credit end****/
    /***For membership****/
    /*
    public function canSendMessage()
    {
        if($this->membership_status == 0)
        {
            $membership = Membership::find(1);
            $membership_features = $membership->membershipFeatures()->where([
                                                            ['site_feature_id', '=', 1]
                                                        ])->first();
            if($membership_features->is_unlimited == 'N')
            {
                if($membership_features->site_feature_value == 0)
                {
                    return 0;
                }
                else
                {
                    $send_messages = $this->chatFromUserMessages()->where([
                                                                    ['is_flirt', '=', 0]
                                                                ])->count();
                    if($membership_features->site_feature_value > $send_messages)
                    {
                        return 1;
                    }
                    else
                    {
                        return 0;
                    }
                }
            }
            else
            {
                return 1;
            }
        }
        else
        {
            $subscription_end_date = NULL;
            if($this->subscription_end_date)
            {
                $subscription_end_date = $this->subscription_end_date;
                $subscription_end_date = date('Y-m-d', $subscription_end_date);
                $todays_date = date('Y-m-d');
                if($subscription_end_date >= $todays_date && $this->user_type == 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }  
            }
            else
            {
                return 0;
            }
        }
    }
    public function canSendFlirt()
    {
        if($this->membership_status == 0)
        {
            $membership = Membership::find(1);
            $membership_features = $membership->membershipFeatures()->where([
                                                            ['site_feature_id', '=', 2]
                                                        ])->first();
            if($membership_features->is_unlimited == 'N')
            {
                if($membership_features->site_feature_value == 0)
                {
                    return 0;
                }
                else
                {
                    $send_messages = $this->chatFromUserMessages()->where([
                                                                    ['is_flirt', '=', 1]
                                                                ])->count();
                    if($membership_features->site_feature_value > $send_messages)
                    {
                        return 1;
                    }
                    else
                    {
                        return 0;
                    }
                }
            }
            else
            {
                return 1;
            }
        }
        else
        {
            $subscription_end_date = NULL;
            if($this->subscription_end_date)
            {
                $subscription_end_date = $this->subscription_end_date;
                $subscription_end_date = date('Y-m-d', $subscription_end_date);
                $todays_date = date('Y-m-d');
                if($subscription_end_date >= $todays_date && $this->user_type == 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }  
            }
            else
            {
                return 0;
            }
        }
    }*/

    /***For membership End****/

    public function isSendMessageOrFlirt($to_user_id = '')
    {
        if($to_user_id == '')
        {
            return false;
        }
        else
        {
            $message_to_user = $this->chatFromUserMessages()->where([
                                                ['to_user_id','=',$to_user_id]
                                            ])->first();
            if(count($message_to_user) > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}
