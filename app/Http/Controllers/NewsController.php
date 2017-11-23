<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;


class NewsController extends Controller
{
    public function allNews()
    {	
    	$allNews = News::orderBy('id', 'desc')->paginate(4);
    	if(view()->exists('allNews')){
    		return view('allNews', ['allNews' => $allNews]);
    	}
    }

    public function singleNews($id)
    {	
    	$news = News::all()->sortByDesc('id')->take(3);
    	$singleNews = News::where('id', $id)->first();
    	if(view()->exists('singleNews')){
    		return view('singleNews',['singleNews' => $singleNews, 'news' => $news]);
    	}
    }
}
