<?php
/**
 * Created by PhpStorm.
 * User: Pritam
 * Date: 09-01-2017
 * Time: 12:54 PM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
class RelationshipstatusTranslation extends Model
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