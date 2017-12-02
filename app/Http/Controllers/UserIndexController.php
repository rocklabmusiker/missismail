<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserMail;
use App\AdminMail;
use Auth;
use Mail;
use App\Mail\EmailUserSupport;
use App\HelpOrder;
use App\SelfOrder;


class UserIndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $user = Auth::user();
        $user_id = Auth::user()->id;

        $orderHelpCount = HelpOrder::where('user_id', $user_id)->count();
        $orderSelfCount = SelfOrder::where('user_id', $user_id)->count();
        $adminEmails = AdminMail::where('user_id', $user_id)->where('status', 'new')->count();

        return view('user.userIndex', ['user' => $user, 'orderHelpCount' => $orderHelpCount, 'orderSelfCount' => $orderSelfCount, 'adminEmails' => $adminEmails]);
    }


    public function indexPost(Request $request)
    {
        if($request->isMethod('post')) {

            $user_id = Auth::user()->id;


            $user = User::find($user_id);

            $rules = [
                'theme' => 'required|max:200',
                'text' => 'required'
            ];

            $messages = [   'theme.required' => 'Поле тема не должно быть пустым',
                            'text.required' => 'Поле сообщение не должно быть пустым'
                        ];

            $this->validate($request, $rules, $messages);


            $user->userMails()->create([
                'theme' => $request->theme,
                'text' => $request->text,
            ]);


            $user_email = Auth::user()->email;
            $theme = $request->theme;
            $text = $request->text;


            if ($request->hasFile('file')) {
                
                $file = $request->file('file');

                $destinationPath =  public_path().'/assets/uploads/';

                $filename = uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move($destinationPath, $filename);
            }
            else {
                $filename = null;
            }
            

          

            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new EmailUserSupport($user_email, $theme, $text, $filename));

            return back()->with('success', 'Ваше сообщение успешно отправлено!');
        } 
       
    }
}
