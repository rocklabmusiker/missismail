<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\AdminMail;
use App\UserMail;
use Auth;

class AllEmailsController extends Controller
{
    public function adminEmails()
    {	
    	

    	if(view()->exists('user.allEmails')) {
    		$user_id = Auth::user()->id;

    		$adminEmails = AdminMail::orderBy('id', 'desc')->where('user_id', $user_id)->paginate(10);

    		return view('user.allEmails', ['adminEmails' => $adminEmails]);
    	}
    }

    public function adminEmailUpdate(Request $request, $adminEmail_id) {
    	if($request->isMethod('put')) {
    		$adminEmail_id = AdminMail::where('id', $adminEmail_id);

    		$adminEmail_id->update([
    			'status' => 'old',
    		]);

    		return back();
    	}
    }

    public function adminEmailDelete(Request $request, $adminEmail_id) {
    	if($request->isMethod('delete')) {
    		$adminEmail_id = AdminMail::where('id', $adminEmail_id);

    		$adminEmail_id->delete();

    		return back();
    	}
    }

     public function userEmails()
    {	
    	

    	if(view()->exists('user.userEmails')) {
    		$user_id = Auth::user()->id;

    		$userEmails = UserMail::orderBy('id', 'desc')->where('user_id', $user_id)->paginate(10);

    		return view('user.userEmails', ['userEmails' => $userEmails]);
    	}
    }

    public function userEmailDelete(Request $request, $userEmail_id) {
    	if($request->isMethod('delete')) {
    		$userEmail_id = UserMail::where('id', $userEmail_id);

    		$userEmail_id->delete();

    		return back();
    	}
    }
}
