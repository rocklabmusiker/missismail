<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SelfOrder;
use Auth;

class ShowAllOrderSelfController extends Controller
{
   public function get() 
    {
    	if(view()->exists('user.userShowAllOrderSelf')) {

    		$user_id = Auth::user()->id;

    		$allSelfOrders = SelfOrder::orderBy('id', 'desc')->where('user_id', $user_id)->paginate(10);

    		return view('user.userShowAllOrderSelf',['allSelfOrders' => $allSelfOrders]);
    	}
    }

    public function delete(Request $request, $orderSelfId) 
    {
    	if($request->isMethod('delete')) {
    		$status = SelfOrder::where('id', $orderSelfId);
    		$status->delete();

    		return back()->with('success', 'Ваш заказ успешно удалён');
    	}
    } 
}
