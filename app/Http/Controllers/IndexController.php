<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\EmailFromFooter;

use Mail;

use Session;

use Illuminate\Support\Facades\Input as input;


class IndexController extends Controller
{
    
    public function index() {
 
    	if(view()->exists('index')) {
    		return view('index');
    	} else {
    		abort(404);
    	}
    	
    }


    // этот контроллер для записи в сессию емайла из форм в одно поле
    public function inputForm(Request $request) {

        if($request->isMethod('post')) {


            $inputEmailHeader = $request->inputEmailHeader;

            $rules = ['inputEmailHeader' => 'required|email|max:50'];
            $messages = ['inputEmailHeader.email' => 'Пожалуйста, введите валидный E-mail'];

            $this->validate($request, $rules, $messages);

            $request->session()->put('inputEmail', $inputEmailHeader);

             
            return redirect()->route('register');
        }

    }

  

    public function formFromFooter(Request $request) {

    	if($request->only(['name','email','text'])) {

    		$rules = [
    			'name' => 'required|max:50',
    			'email' => 'required|email|max:50',
    			'text' => 'required'
    		];

            $messages = ['email.email' => 'Пожалуйста, введите валидный E-mail'];

            $name = $request->name;
            $email = $request->email;
            $text = $request->text;

    		$this->validate($request, $rules, $messages);
    		
    		
    		Mail::to(env('MAIL_FROM_ADDRESS'))->send(new EmailFromFooter($name,$email,$text));

            
            return back()->with('success', 'Ваше сообщение успешно отправлено!'); 

    	} 
	
    }



}
