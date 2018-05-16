<?php
/**
 * Created by PhpStorm.
 * User: Pritam
 * Date: 03/01/2017
 * Time: 12:40 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Ethnicity extends Model
{
    use Translatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ethnicity_id', 'name'];
    /**
     * The attributes that are mass translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];
}