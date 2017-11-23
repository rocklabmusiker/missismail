<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Testimonial;

class TarifController extends Controller
{
    public function get()
    {
    	$news = News::all()->sortByDesc('id')->take(3);
    	$testimonial = Testimonial::all()->sortByDesc('id')->take(3);
    	return view('tarif', ['news' => $news, 'testimonial' => $testimonial]);

    	
    }
    
}
