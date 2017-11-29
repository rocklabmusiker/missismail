<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments'; 


    protected $fillable = ['money', 'status'];


    public function user() 
    {
    	return $this->belongsTo('App\User');
    }
}
