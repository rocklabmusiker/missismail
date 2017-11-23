<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class ShopsController extends Controller
{
    public function get()
    {
    	$shops = Shop::all();
    	if(view()->exists('shops')){
    		return view('shops', compact('shops'));
    	}
    	
    }
}
