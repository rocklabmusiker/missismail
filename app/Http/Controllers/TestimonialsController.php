<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialsController extends Controller
{
    

    public function allTestimonials()
    {	
    	$allTestimonials = Testimonial::paginate(10);
    	if(view()->exists('allTestimonials')){
    		return view('allTestimonials', compact('allTestimonials'));
    	}
    }
}
