<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'admin_name',
        'admin_email',
        'site_title',
        'contact_email',
        'contact_name',
        'contact_phone',
        'site_logo',
        'message_warning_time',
        'leftPanel_banner',
        'deafault_currency',
        'credits_per_message',
        'credits_per_flirt',
        'credits_per_gift',
        'googlemap_api_key',
        'sent_bot_user_count',
        'sent_bot_time',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'send_view_user_count',
        'send_view_time',
        'pop_interval_time',
        'no_of_pop',
        'pop_interval_idle_time',
        'max_message_text',
        'msg_send_lobby_percentage',
        'msg_send_lobby_last_week_percentage',
        'site_fb_link',
        'site_gplus_link',
        'site_twitter_link'
    ];

    public function currency()
    {
        return $this->belongsTo('App\Currency','deafault_currency','id');
    } 
}
