<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\MailFromUserProfilOrderWithHelp;
use Auth;
use Mail;
use App\User;
use App\HelpOrder;
use App\SelfOrder;
use App\AdminMail;
use App\UserMail;
use App\Memo;
use App\Testimonial;
use Carbon\Carbon;



class AdminOrderWithHelpController extends Controller
{	
	 public function __construct()
    {
        $this->middleware('auth:admin');
    }



     public function orderWithHelpNew() 
    {

    	$ordersNew = HelpOrder::all()->where('status', 'new')->sortByDesc('id');
    	
        return view('admin.orderwithhelp.adminOrderWithHelpNew', ['ordersNew' => $ordersNew]);
    }



     public function orderWithHelpInProcessing() 
    {

    	$ordersInProcessing = HelpOrder::all()->where('status', 'in_processing')->sortByDesc('id');
    	
        return view('admin.orderwithhelp.adminOrderWithHelpInProcessing', ['ordersInProcessing' => $ordersInProcessing]);
    }



      public function orderWithHelpDone() 
    {

    	$ordersDone = HelpOrder::all()->where('status', 'done')->sortByDesc('id');
    	
        return view('admin.orderwithhelp.adminOrderWithHelpDone', ['ordersDone' => $ordersDone]);
    }



      public function orderWithHelpArchive() 
    {

        $ordersArchive = HelpOrder::all()->where('status', 'archive')->sortByDesc('id');
        
        return view('admin.orderwithhelp.adminOrderWithHelpArchive', ['ordersArchive' => $ordersArchive]);
    }



    public function userProfilOrderWithHelp($id, $order)
    {
        if(!$id) {
            abort(404);
        }

        $user = User::find($id); // находит id пользователя по get параметру
        $id_order = HelpOrder::find($order); // находит id пользователя по get параметру
        $status = HelpOrder::where('user_id', $id)->where('id', $order)->first(); // находим пользователя по get параметрам, где совпадают все параметры
        $sum_orders = HelpOrder::where('user_id', $id)->count();
        // получаем список писем отправеных клиентом в поддержку
        $userMails = UserMail::where('user_id', $id)->get()->sortByDesc('id');

        // получаем список писем отправеных админом клиенту
        $adminMails = AdminMail::where('user_id', $id)->get()->sortByDesc('id');

        $memo = Memo::orderBy('id', 'desc')->where('user_id', $id)->where('order_id', $order)->first();




        if(view()->exists('admin.orderwithhelp.adminUserProfileWithHelp')) {
            return view('admin.orderwithhelp.adminUserProfileWithHelp', ['user' => $user, 'status' => $status, 'id_order' => $id_order, 'sum_orders' => $sum_orders, 'userMails' => $userMails, 'adminMails' => $adminMails, 'memo' => $memo]); 
        }

        
    }

   

     public function userProfilOrderWithHelpDeleteOrder(Request $request, $id, $order) 
    {
        if($request->isMethod('delete')) {

            
            $status = HelpOrder::where('user_id', $id)->where('id', $order);
            $status->delete();

            $memo = Memo::where('user_id', $id)->where('order_id',$order);
            $memo->delete();

        
            return redirect()->route('adminHome');
          
        }

    }

    public function userProfilOrderWithHelpUpdateDebt(Request $request, $id, $order) 
    {
        if($request->isMethod('put')) {
           
            $status = User::where('id', $id);
            
            $status->update([
                    'debt' => $request->debt,
            ]);

            return back();
          
        }

    }


     public function userProfilOrderWithHelpUpdateMoney(Request $request, $id, $order) 
    {
        if($request->isMethod('put')) {
           
            $status = User::where('id', $id);
            
            $status->update([
                    'money' => $request->money,
            ]);

            return back();
          
        }

    }




     public function userProfilOrderWithHelpAccessBuySelf(Request $request, $id, $order) 
    {
        if($request->isMethod('put')) {

            $status = User::where('id', $id);
            
            $status->update([
                    'showAddressForOrderSelf' => $request->showAddressForOrderSelf,
            ]);

            return back();
          
        }

    }

     public function userProfilOrderWithHelpUpdateStatus(Request $request, $id, $order) 
    {
        if($request->isMethod('put')) {
           
            $status = HelpOrder::where('user_id', $id)->where('id', $order);
            $status->update([
                    'status' => $request->status,
            ]);

            return back();
          
        }

    }
    
    // memo

    public function userProfilOrderWithHelpMemo(Request $request, $id, $order)
    {
        if($request->isMethod('put')){

            $user_id = User::find($id)->id;
            $rules = ['text' => 'required'];
            $messages = ['text.required' => 'Поле заметки должно быть заполнено!'];
            $this->validate($request, $rules, $messages);

            
            Memo::create([
                'text' => $request->text,
                'user_id' => $user_id,
                'order_id' => $order,

            ]);


            return back();
        }
        
    }


    public function userProfilOrderWithHelpDeleteMemo(Request $request, $id, $order)
    {
        if($request->isMethod('delete')) {
            $memo = Memo::where('user_id', $id)->where('order_id',$order)->first();
            $memo->delete();

            return redirect()->route('adminUserProfilOrderWithHelp',['user_id' => $id, 'order_id' => $order]);
        }
       
    }


    // Emails

    public function userProfilOrderWithHelpEmail(Request $request, $id, $order)
    {
        if($request->isMethod('post')) {

            $theme = $request->theme;
            $email = $request->email;
            $text = $request->text;
            $file = $request->file;

            $rules = [  'theme' => 'required', 
                        'email' => 'email|required', 
                        'text' => 'required'];
            $messages = [   'theme.required' => 'Поле тема сообщения не заполнено',
                            'email.required' => 'Внесите email',
                            'text.required' => 'Напишите сообщение'];

            $this->validate($request, $rules, $messages);

            // запись в таблицу в базу
            $user = User::find($id);
            $user->adminMails()->create([
                'theme' => $request->theme,
                'text' => $request->text,
            ]);


            Mail::to($email)->send(new MailFromUserProfilOrderWithHelp($theme, $text, $file));

            return back()->with('success', 'Ваше сообщение успешно отправлено!');
        }
        else {
            return back()->with('error', 'Что-то пошло не так! Попробуйте ещё раз.');
        }
    }

    // show and delete AdminMail

    public function userProfilOrderWithHelpShowAdminMail($id, $order, $id_mail)
    {
        $user = User::find($id); // находит id пользователя по get параметру
        $id_order = HelpOrder::find($order); // находит id пользователя по get параметру
        $adminMail = AdminMail::where('user_id', $id)->where('id', $id_mail)->first();


        return view('admin.orderwithhelp.adminUserProfileShowAdminMail', ['user' => $user, 'id_order' => $id_order,'adminMail' => $adminMail]);
    }


    public function userProfilOrderWithHelpDeleteAdminMail(Request $request, $id, $order, $id_mail)
    {
        if($request->isMethod('delete')){

            $deleteAdminMail = AdminMail::where('user_id', $id)->where('id', $id_mail);
            $deleteAdminMail->delete();

        
            return redirect()->route('adminUserProfilOrderWithHelp',['user_id' => $id, 'order_id' => $order]);

        }
    }


     // show and delete UserMail

    public function userProfilOrderWithHelpShowUserMail($id, $order, $id_mail)
    {
        $user = User::find($id); // находит id пользователя по get параметру
        $id_order = HelpOrder::find($order); // находит id пользователя по get параметру
        $userMail = UserMail::where('user_id', $id)->where('id', $id_mail)->first();


        return view('admin.orderwithhelp.adminUserProfileShowUserMail', ['user' => $user, 'id_order' => $id_order,'userMail' => $userMail]);
    }


    public function userProfilOrderWithHelpDeleteUserMail(Request $request, $id, $order, $id_mail)
    {
        if($request->isMethod('delete')){

            $deleteUserMail = UserMail::where('user_id', $id)->where('id', $id_mail);
            $deleteUserMail->delete();

        
            return redirect()->route('adminUserProfilOrderWithHelp',['user_id' => $id, 'order_id' => $order]);

        }
    }



}
