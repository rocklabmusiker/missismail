<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelfOrder extends Model
{
    protected $table = 'selfOrders';

    protected $fillable = [
    	'name', 'price', 'value', 'color', 'size', 'comment',
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
