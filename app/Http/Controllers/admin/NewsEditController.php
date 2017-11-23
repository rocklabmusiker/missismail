<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsEditController extends Controller
{
    public function show()
    {
    	$news = News::all()->sortByDesc('id');

    	if(view()->exists('admin.news.newsEdit')){
    		return view('admin.news.newsEdit', ['news' => $news]);
    	}
    }

    public function create(Request $request) 
    {
    	if($request->isMethod('put')){


    		$rules = ['titel' => 'required|max:255', 'exerpt' => 'required|max:255'];
    		$messages = ['titel.required' => 'Поле заголовок слишком длинное',
    					 'exerpt.required' => 'Поле отрывок слишком длинное',
    		];

    		$this->validate($request, $rules, $messages);

           	News::create([
    			'titel' => $request->titel,
    			'text' => $request->text,
    			'exerpt' => $request->exerpt,
    			'image' => $request->image,

    		]);


            if ($request->hasFile('file')) {
                
                $file = $request->file('file');

                $destinationPath =  public_path().'/assets/images/news/';

                $filename = $file->getClientOriginalName();

                $file->move($destinationPath, $filename);
            }
            


    		return back()->with('success', 'Новость создана!');
    	}
    }

    public function delete(Request $request, $id)
    {
    	if($request->isMethod('delete')){
    		$result = News::where('id', $id);

    		$result->delete();

    		return back()->with('success', 'Новость удалена!');
    	}
    }

}
