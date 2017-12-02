<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\HelpOrder;
use Auth;

use Mail;
use App\Mail\EmailOrderWithHelp;



class OrderWithHelpController extends Controller
{

	public function __construct() {
		$this->middleware('web');
		$this->middleware('auth');
	}



  	public function get() 
   	{
	   	return view('user.userOrderWithHelp');
	}




    public function send(Request $request) 
  	{
   		if($request->isMethod('post')) {

          
          // добавляем в базу
     			$user_id = Auth::user()->id;
     			$user = User::find($user_id);
     			$user->helpOrders()->create([
     				'link' => $request->link,
     				'name' => $request->name,
     				'article' => $request->article,
     				'price' => $request->price,
            'shipment' => $request->shipment,
     				'value' => $request->value,
     				'color' => $request->color,
     				'size' => $request->size,
     				'comment' => $request->comment,
     			]);


          $user_email = Auth::user()->email;
          $link = $request->link;
          $name = $request->name;
          $article = $request->article;
          $price = $request->price;
          $shipment = $request->shipment;
          $value = $request->value;
          $color = $request->color;
          $size = $request->size;
          $comment = $request->comment;

         //dd($id);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new EmailOrderWithHelp(
          $user_email, $link, $name, $article, $price, $shipment, $value, $color, $size, $comment));

   			return back()->with('success', 'Ваш заказ отправлен на обработку!');
   		}

   		else {
   			return back()->with('error', 'Что-то пошло не так! Попробуйте ещё раз или обратитесь в службу поддержки.');
   		}
   	}

}
