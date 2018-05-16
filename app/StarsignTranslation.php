<?php
/**
 * Created by PhpStorm.
 * User: saibal
 * Date: 28/7/16
 * Time: 5:57 PM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
class StarsignTranslation extends Model
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