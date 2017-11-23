<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
use Input;
use Redirect;
use Session;
use URL;
use App\User;

class PaymentController extends Controller
{
    public function get()
    {
    	if(view()->exists('user.payment')){
    		return view('user.payment');
    	}
    }

    public function send(Request $request)
    {
    	$validator = Validator::make($request->all(), [
		 'card_no' => 'required',
		 'ccExpiryMonth' => 'required',
		 'ccExpiryYear' => 'required',
		 'cvvNumber' => 'required',
		 //'amount' => 'required',
		 ]);

    	$input = $request->all();
		 if ($validator->passes()) { 
		 $input = array_except($input,array('_token'));
		 $stripe = Stripe::make('sk_test_UqxO4SRAdSvmtDa2dt3jDUiy');
		 try {
		 $token = $stripe->tokens()->create([
		 'card' => [
		 'number' => $request->get('card_no'),
		 'exp_month' => $request->get('ccExpiryMonth'),
		 'exp_year' => $request->get('ccExpiryYear'),
		 'cvc' => $request->get('cvvNumber'),
		 ],
		 ]);

		 if (!isset($token['id'])) {
		 return redirect()->route('payment');
		 }
		 
		 $charge = $stripe->charges()->create([
		 'card' => $token['id'],
		 'currency' => 'EUR',
		 'amount' => 10.49,
		 'description' => 'Add in wallet',
		 ]);


    
     
		     if($charge['status'] == 'succeeded') {
		     /**
		     * Write Here Your Database insert logic.
		     */
		     echo "<pre>";
		     print_r($charge);exit();
		     return redirect()->route('payment');
		     } else {
		     \Session::put('error','Money not add in wallet!!');
		     return redirect()->route('payment');
		     }
		     } catch (Exception $e) {
		     \Session::put('error',$e->getMessage());
		     return redirect()->route('payment');
		     } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
		     \Session::put('error',$e->getMessage());
		     return redirect()->route('payment');
		     } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
		     \Session::put('error',$e->getMessage());
		     return redirect()->route('payment');
		     }
     	}

    }
}
