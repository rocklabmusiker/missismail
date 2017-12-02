<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\MailFromUserProfilOrderSelf;
use Auth;
use Mail;
use App\User;
use App\HelpOrder;
use App\SelfOrder;
use App\OrderSelfAdminMail;
use App\UserMail;
use App\SelfMemo;
use App\Testimonial;
use Carbon\Carbon;

class AdminOrderSelfController extends Controller
{
    

     public function __construct()
    {
       /* $this->middleware('web');*/
        $this->middleware('auth:admin');
    }


      public function orderSelfNew() 
    {

    	$ordersNew = SelfOrder::all()->where('status', 'new')->sortByDesc('id');
    	
        return view('admin.orderself.adminOrderSelfNew', ['ordersNew' => $ordersNew]);
    }



     public function orderSelfInProcessing() 
    {

    	$ordersInProcessing = SelfOrder::all()->where('status', 'in_processing')->sortByDesc('id');
    	
        return view('admin.orderself.adminOrderSelfInProcessing', ['ordersInProcessing' => $ordersInProcessing]);
    }



      public function orderSelfDone() 
    {

    	$ordersDone = SelfOrder::all()->where('status', 'done')->sortByDesc('id');
    	
        return view('admin.orderself.adminOrderSelfDone', ['ordersDone' => $ordersDone]);
    }



      public function orderSelfArchive() 
    {

        $ordersArchive = SelfOrder::all()->where('status', 'archive')->sortByDesc('id');
        
        return view('admin.orderself.adminOrderSelfArchive', ['ordersArchive' => $ordersArchive]);
    }



    public function userProfilOrderSelf($id, $order)
    {
        if(!$id) {
            abort(404);
        }

        $user = User::find($id); // находит id пользователя по get параметру
        $id_order = SelfOrder::find($order); // находит id пользователя по get параметру
        $status = SelfOrder::where('user_id', $id)->where('id', $order)->first(); // находим пользователя по get параметрам, где совпадают все параметры
        $sum_orders = SelfOrder::where('user_id', $id)->count();
        // получаем список писем отправеных клиентом в поддержку
        $userMails = UserMail::where('user_id', $id)->get()->sortByDesc('id');

        // получаем список писем отправеных админом клиенту
        $adminMails = OrderSelfAdminMail::where('user_id', $id)->get()->sortByDesc('id');

        $memo = SelfMemo::where('user_id', $id)->first();




        if(view()->exists('admin.orderself.adminUserProfileSelf')) {
            return view('admin.orderself.adminUserProfileSelf', ['user' => $user, 'status' => $status, 'id_order' => $id_order, 'sum_orders' => $sum_orders, 'userMails' => $userMails, 'adminMails' => $adminMails, 'memo' => $memo]); 
        }

        
    }

   

     public function userProfilOrderSelfDeleteOrder(Request $request, $id, $order) 
    {
        if($request->isMethod('delete')) {

            
            $status = SelfOrder::where('user_id', $id)->where('id', $order);
            $status->delete();

        
            return redirect()->route('adminHome');
          
        }

    }

     public function userProfilOrderSelfUpdateMoney(Request $request, $id, $order) 
    {
        if($request->isMethod('put')) {
           
            $status = User::where('id', $id);
            
            $status->update([
                    'money' => $request->money,
            ]);

            return back();
          
        }

    }


     public function userProfilOrderSelfAccessBuySelf(Request $request, $id, $order) 
    {
        if($request->isMethod('put')) {

            $status = User::where('id', $id);
            
            $status->update([
                    'showAddressForOrderSelf' => $request->showAddressForOrderSelf,
            ]);

            return back();
          
        }

    }

     public function userProfilOrderSelfUpdateStatus(Request $request, $id, $order) 
    {
        if($request->isMethod('put')) {
           
            $status = SelfOrder::where('user_id', $id)->where('id', $order);
            $status->update([
                    'status' => $request->status,
            ]);

            return back();
          
        }

    }
    
    // memo

    public function userProfilOrderSelfMemo(Request $request, $id, $order)
    {
        if($request->isMethod('put')){

            $rules = ['text' => 'required'];
            $messages = ['text.required' => 'Поле заметки должно быть заполнено!'];
            $this->validate($request, $rules, $messages);

            SelfMemo::create([
                'text' => $request->text,

            ]);


            return back();
        }
        
    }


    public function userProfilOrderSelfDeleteMemo(Request $request, $id, $order)
    {
        if($request->isMethod('delete')) {
            $memo = SelfMemo::where('user_id', $id)->first();
            $memo->delete();

            return redirect()->route('adminUserProfilOrderSelf',['user_id' => $id, 'order_id' => $order]);
        }
       
    }


    // Emails

    public function userProfilOrderSelfEmail(Request $request, $id, $order)
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
            $user->orderSelfAdminMails()->create([
                'theme' => $request->theme,
                'text' => $request->text,
            ]);


            Mail::to($email)->send(new MailFromUserProfilOrderSelf($theme, $text, $file));

            return back()->with('success', 'Ваше сообщение успешно отправлено!');
        }
        else {
            return back()->with('error', 'Что-то пошло не так! Попробуйте ещё раз.');
        }
    }

    // show and delete AdminMail

    public function userProfilOrderSelfShowAdminMail($id, $order, $id_mail)
    {
        $user = User::find($id); // находит id пользователя по get параметру
        $id_order = SelfOrder::find($order); // находит id пользователя по get параметру
        $adminMail = OrderSelfAdminMail::where('user_id', $id)->where('id', $id_mail)->first();


        return view('admin.orderself.adminUserProfileShowAdminMail', ['user' => $user, 'id_order' => $id_order,'adminMail' => $adminMail]);
    }


    public function userProfilOrderSelfDeleteAdminMail(Request $request, $id, $order, $id_mail)
    {
        if($request->isMethod('delete')){

            $deleteAdminMail = OrderSelfAdminMail::where('user_id', $id)->where('id', $id_mail);
            $deleteAdminMail->delete();

        
            return redirect()->route('adminUserProfilOrderSelf',['user_id' => $id, 'order_id' => $order]);

        }
    }


     // show and delete UserMail

    public function userProfilOrderSelfShowUserMail($id, $order, $id_mail)
    {
        $user = User::find($id); // находит id пользователя по get параметру
        $id_order = SelfOrder::find($order); // находит id пользователя по get параметру
        $userMail = UserMail::where('user_id', $id)->where('id', $id_mail)->first();


        return view('admin.orderself.adminUserProfileShowUserMail', ['user' => $user, 'id_order' => $id_order,'userMail' => $userMail]);
    }


    public function userProfilOrderSelfDeleteUserMail(Request $request, $id, $order, $id_mail)
    {
        if($request->isMethod('delete')){

            $deleteUserMail = UserMail::where('user_id', $id)->where('id', $id_mail);
            $deleteUserMail->delete();

        
            return redirect()->route('adminUserProfilOrderSelf',['user_id' => $id, 'order_id' => $order]);

        }
    }
}
