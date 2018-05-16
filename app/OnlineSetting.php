<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineSetting extends Model
{
    protected $table = 'online_settings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'time_text',
        'start_hour',
        'end_hour',
        'city_id',
        'online_percentage',
        'audio_status'
    ];

}
