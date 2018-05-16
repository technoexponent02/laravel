<?php
/**
 * Created by Pritam.
 * User: Pritam
 * Date: 17-01-2017
 * Time: 02:43 PM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
class CreditTranslation extends Model
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
