<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerReport extends Model
{
     protected $table = 'customer_reports';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id', 'model_id', 'customer_username', 'model_username', 'comment', 'end_time', 'status'];
    
    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id', 'id');
    }
    public function model()
    {
        return $this->belongsTo('App\User','model_id', 'id');
    }
}
