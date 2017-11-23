<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImpressumController extends Controller
{
   public function get()
   {

	   	if(view()->exists('impressum')) {
	   		return view('impressum');

	   	}

   }
}
