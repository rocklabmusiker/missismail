<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelfMemo extends Model
{
    protected $table = 'selfMemos';
    protected $fillable = ['text', 'order_id', 'user_id'];


    public function user() {
    	return $this->belondsTo('App\User');
    }

    
}
