<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;

class ShopEditController extends Controller
{
    public function show() {
    	$shops = Shop::orderBy('id', 'desc')->paginate(10);

    	if(view()->exists('admin.shops.shopsEdit')){
    		return view('admin.shops.shopsEdit',compact('shops'));
    	}
    }

      public function create(Request $request) 
    {
    	if($request->isMethod('put')){


    		$rules = [	'titel' => 'required|max:255', 
    					'link' => 'required|max:255', 
    					'filter' => 'required|max:255',
    					'image' => 'required|max:255',
    				];
    		$messages = ['titel.required' => 'Поле заголовок должно быть заполнено',
    					 'link.required' => 'Поле ссылка должно быть заполнено',
    					 'filter.required' => 'Поле фильтр должно быть заполнено',
    					 'image.required' => 'Поле картинка должно быть заполнено',
    		];

    		$this->validate($request, $rules, $messages);

           	Shop::create([
    			'titel' => $request->titel,
    			'link' => $request->link,
    			'filter' => $request->filter,
    			'image' => $request->image,

    		]);


            if ($request->hasFile('file')) {
                
                $file = $request->file('file');

                $destinationPath =  public_path().'/assets/images/shops/';

                $filename = $file->getClientOriginalName();

                $file->move($destinationPath, $filename);
            }
            


    		return back()->with('success', 'Магазин создан!');
    	}
    }

    public function delete(Request $request, $id)
    {
    	if($request->isMethod('delete')){
    		$result = Shop::where('id', $id);

    		$result->delete();

    		return back()->with('success', 'Магазин удалён!');
    	}
    }
}
