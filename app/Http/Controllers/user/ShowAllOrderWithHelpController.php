<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HelpOrder;
use Auth;

class ShowAllOrderWithHelpController extends Controller
{
    
    public function get() 
    {
    	if(view()->exists('user.userShowAllOrderWithHelp')) {

    		$user_id = Auth::user()->id;

    		$allHelpOrders = HelpOrder::orderBy('id', 'desc')->where('user_id', $user_id)->paginate(10);

    		return view('user.userShowAllOrderWithHelp',['allHelpOrders' => $allHelpOrders]);
    	}
    }

    public function delete(Request $request, $orderHelpId) 
    {
    	if($request->isMethod('delete')) {
    		$status = HelpOrder::where('id', $orderHelpId);
    		$status->delete();

    		return back()->with('success', 'Ваш заказ успешно удалён');
    	}
    }
}
