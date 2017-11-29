<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\HelpOrder;
use App\SelfOrder;
use App\Payment;

class PaymentController extends Controller
{
    public function get()
    {
    	if(view()->exists('user.payment')){
            $user_id = Auth::user()->id;
            $paymentLists = Payment::all()->where('user_id', $user_id);
            

    		return view('user.payment', ['paymentLists' => $paymentLists]);
    	}
    }



     public function send(Request $request)
    {
    	

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $token = $_POST['stripeToken'];
        // $amount = Auth::user()->money;
        $amount = Auth::user()->debt;

        // Charge the user's card:
        $charge = \Stripe\Charge::create(array(
          "amount" => $amount,
          "currency" => "eur",
          "description" => "Example charge",
          "source" => $token,
        ));

        $money = $charge->amount / 100;

        Payment::create([
            'money' => $money,
        ]);

    	return back()->with('success', 'После подтверждения платежа, мы зачислем его на ваш баланс в личном кабинете!');

    }
}
