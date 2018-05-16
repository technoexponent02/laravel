<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $table = 'gifts';
    protected $fillable = [
        'gift_name',
        'gift_image',
        'gift_image_ext',
        'gift_status',
    ];
}
