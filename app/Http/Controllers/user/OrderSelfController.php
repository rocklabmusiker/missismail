<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Mail;
use App\User;
use App\SelfOrder;
use App\Mail\EmailOrderSelf;

class OrderSelfController extends Controller
{

	public function __construct() {
		$this->middleware('web');
		$this->middleware('auth');
	}


    public function get()
    {
    	return view('user.userOrderSelf');
    }



    public function send(Request $request) 
    {
    	if($request->isMethod('post')) {
    		
    		$user_id = Auth::user()->id;
    		$user = User::find($user_id);
    		$user->selfOrders()->create([
 				'name' => $request->name,
 				'price' => $request->price,
 				'value' => $request->value,
 				'color' => $request->color,
 				'size' => $request->size,
 				'comment' => $request->comment,
    		]);

    		$user_email = Auth::user()->email;
	        $name = $request->name;
	        $price = $request->price;
	        $value = $request->value;
	        $color = $request->color;
	        $size = $request->size;
	        $comment = $request->comment;

	        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new EmailOrderSelf(
          	$user_email, $name, $price, $value, $color, $size, $comment));

	        return redirect()->route('orderSelf')->with('success', 'Ваше уведомление о заказе отправлено на обработку!');
    	} 
    	else {
   			return back()->with('error', 'Что-то пошло не так! Попробуйте ещё раз или обратитесь в службу поддержки.');
   		}
    }
}
