<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatenSchutzController extends Controller
{
    public function get()
   {

	   	if(view()->exists('datenSchutz')) {
	   		return view('datenSchutz');

	   	}

   }
}
