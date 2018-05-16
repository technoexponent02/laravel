<?php
/**
 * Created by PhpStorm.
 * User: Pritam
 * Date: 09-01-2017
 * Time: 12:54 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Relationshipstatus extends Model
{
    use Translatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['Relationshipstatus_id', 'name'];
    /**
     * The attributes that are mass translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];
}