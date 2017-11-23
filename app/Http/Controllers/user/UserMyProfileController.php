<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input as input;
use App\User;
use Auth;
use Hash;


class UserMyProfileController extends Controller
{
	public function __construct() {
		$this->middleware('web');
		$this->middleware('auth');
	}
    

    public function get() 
    {

    	$user = Auth::user();
        

    	return view('user.userMyProfile', ['user' => $user]);
    }


    public function show()
    {
        return view('user.userMyProfileEdit');
    }



    public function edit(Request $request) 
    {
    	
    	if($request->isMethod('put')) {

    		$user_id = Auth::user()->id;
    		
    		$update = User::where('id', $user_id)
    		->update([
    			'name' => $request->name,
    			'lastname' => $request->lastname,
    			'street' => $request->street,
    			'homeNumber' => $request->homeNumber,
    			'flat' => $request->flat,
    			'postcode' => $request->postcode,
    			'city' => $request->city,
    			'area' => $request->area,
    			'country' => $request->country,
    			'phoneNumber' => $request->phoneNumber,
    			'mobile' => $request->mobile,

    		]);

    		return redirect()->route('userMyProfile')->with('success', 'Ваши данные успешно обновлены!');
    	} 

    }



    public function changePasswordView() {

        return view('user.userMyProfileChangePassword');
    }


    public function changePassword() 
    {

        $user = User::find(Auth::user()->id);

        if(Hash::check(Input::get('passwordOld'), $user['password']) && Input::get('password') == Input::get('password_confirmation')) {

            $user->password = bcrypt(Input::get('password'));
            $user->save();
            
            return back()->with('success', 'Пароль изменён!');

        }
        else {
            return back()->with('error', 'Ошибка, возможно, новые пароли не идентичны');
        }

    }


    public function getTestimonials()
    {
        
        return view('user.userMyProfileTestimonials');

    }

    public function sendTestimonials(Request $request)
    {
      if($request->isMethod('post')) {

        $user_id = Auth::user()->id;

        $user = User::find($user_id);

         $rules = [
                'name' => 'required|max:200',
                'text' => 'required'
        ];

        $messages = [   'name.required' => 'Поле имя не должно быть пустым',
                        'text.required' => 'Поле отзыв не должно быть пустым'
        ];

        $this->validate($request, $rules, $messages);

        $user->testimonials()->create([
            'name' => $request->name,
            'text' => $request->text
        ]);

        return back()->with('success', 'Спасибо за отзыв! Ваш отзыв отправлен на модерацию!');

      }

    }


}
