<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\HelpOrder;
use App\SelfOrder;
use App\Testimonial;
use Carbon\Carbon;



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       /* $this->middleware('web');*/
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $timeNow = Carbon::now(); // время сейчас
        $unixSecondsNow = strtotime($timeNow) - 86400; // время сейчас минус 24 часа
        $time = date('Y-m-d H:i:s', $unixSecondsNow); // формат для timestamps
        $user_reg = User::where('created_at', '>', $time)->count(); // зарегистрированых пользователей
        $order_with_help = HelpOrder::where('created_at', '>', $time)->count();
        $order_self = SelfOrder::where('created_at', '>', $time)->count();
       


        $user_reg_count = User::all()->count();
        $order_with_help_count = HelpOrder::all()->count();
        $order_self_count = SelfOrder::all()->count();
        $testimonials = Testimonial::all()->sortByDesc('id');

 
        return view('admin.adminIndex', ['testimonials' => $testimonials, 'user_reg_count' => $user_reg_count, 'order_with_help_count' => $order_with_help_count, 'order_self_count' => $order_self_count, 'user_reg' => $user_reg, 'order_with_help' => $order_with_help, 'order_self' => $order_self, 'unixSecondsNow' => $unixSecondsNow]);
    }



    public function adminIndexShowTestimonial($id)
    {
        $testimonial_id = Testimonial::where('id', $id)->first();
        
        return view('admin.adminIndexShowTestimonial', ['testimonial_id' => $testimonial_id]);
    }



      public function adminIndexUpdateTestimonial(Request $request, $id) 
    {
        if($request->isMethod('put')) {

            
            $status = Testimonial::where('id', $id);

            $status->update([
                    'accepted' => $request->accepted
            ]);

            return back()->with('success', 'Статус отзыва, успешно изменён!');
          
        }

    }



      public function adminIndexDeleteTestimonial(Request $request, $id) 
    {
        if($request->isMethod('delete')) {

            
            $status = Testimonial::where('id', $id);
            $status->delete();

        
            return redirect()->route('adminHome');
          
        }

    }



    
    

}
