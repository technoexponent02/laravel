<?php
/**
 * Created by PhpStorm.
 * User: saibal
 * Date: 28/7/16
 * Time: 4:51 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Sexualdrive extends Model
{
    use Translatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sexualdrive_id', 'name'];
    /**
     * The attributes that are mass translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];
}