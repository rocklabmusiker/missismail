<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailOrderSelf extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
        protected $user_email;
        protected $name;
        protected $price;
        protected $value;
        protected $color;
        protected $size;
        protected $comment;

    public function __construct($user_email, $name, $price, $value, $color, $size, $comment)
    {
        $this->user_email = $user_email;
        $this->name = $name;
        $this->price = $price;
        $this->value = $value;
        $this->color = $color;
        $this->size = $size;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.emailOrderSelf')
        ->with([
            'user_email' => $this->user_email,
            'name' => $this->name,
            'price' => $this->price,
            'value' => $this->value,
            'color' => $this->color,
            'size' => $this->size,
            'comment' => $this->comment,
        ])->subject('Новое письмо, сообщить нам о собственной покупке');
    }
}
