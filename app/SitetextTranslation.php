<?php
/**
 * Created by PhpStorm.
 * User: Pritam
 * Date: 11/11/16
 * Time: 7:06 PM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
class SitetextTranslation extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

}