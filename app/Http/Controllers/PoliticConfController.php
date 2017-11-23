<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliticConfController extends Controller
{
     public function get()
    {
    	if(view()->exists('politicConf')) {
    		return view('politicConf');
    	}
    	
    }
}
