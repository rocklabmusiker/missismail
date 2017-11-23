<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RulesController extends Controller
{
    public function get()
    {
    	if(view()->exists('rules')) {
    		return view('rules');
    	}
    	
    }
}
