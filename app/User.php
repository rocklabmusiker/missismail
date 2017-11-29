<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'lastname','street','homeNumber','flat',
        'postcode','city','area','country','phoneNumber',
        'mobile', 'debt', 'money','email_token',

        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function helpOrders()
    {
        return $this->hasMany('App\HelpOrder');
    }

     public function selfOrders()
    {
        return $this->hasMany('App\SelfOrder');
    }

    
    public function testimonials() 
    {
        return $this->hasMany('App\Testimonial');
    }

    public function userMails()
    {
        return $this->hasMany('App\UserMail');
    }

     public function adminMails()
    {
        return $this->hasMany('App\AdminMail');
    }

     public function orderSelfAdminMails()
    {
        return $this->hasMany('App\OrderSelfAdminMail');
    }

    public function memos()
    {
        return $this->hasMany('App\Memo');
    }

    public function selfMemos()
    {
        return $this->hasMany('App\SelfMemo');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

}
