<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $table = 'memos';
    protected $fillable = ['text', 'order_id', 'user_id'];


    public function user() {
    	return $this->belondsTo('App\User');
    }


    
}
