<?php
/**
 * Created by PhpStorm.
 * User: Pritam
 * Date: 03-01-2016
 * Time: 1:28 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Religion extends Model
{
    use Translatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['religion_id', 'name'];
    /**
     * The attributes that are mass translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];
}