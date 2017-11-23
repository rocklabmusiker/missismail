<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderSelfAdminMail extends Model
{
    protected $table = 'orderSelfAdminMails';
    protected $fillable = ['theme', 'text'];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
