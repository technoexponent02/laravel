<?php
/**
 * Created by PhpStorm.
 * User: Pritam
 * Date: 03-01-2016
 * Time: 1:28 PM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
class ReligionTranslation extends Model
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