<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HelpOrder extends Model
{
	protected $table = 'helpOrders'; 


    protected $fillable = [
    	'link', 'name', 'article', 'price', 'shipment',
    	'value', 'color', 'size', 'comment',

    ];


    public function user() 
    {
    	return $this->belongsTo('App\User');
    }


   

}
