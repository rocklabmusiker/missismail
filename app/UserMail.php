<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMail extends Model
{
    protected $table = 'userMails';

    protected $fillable = ['theme', 'text'];


    public function user() {
    	return $this->belongsTo('App\User');
    }
}
