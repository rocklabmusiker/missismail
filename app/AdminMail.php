<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminMail extends Model
{
    protected $table = 'adminMails';
    protected $fillable = ['theme', 'text'];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
