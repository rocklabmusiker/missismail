<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailOrderWithHelp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

        protected $user_email;
        protected $link;
        protected $name;
        protected $article;
        protected $price;
        protected $shipment;
        protected $value;
        protected $color;
        protected $size;
        protected $comment;

    public function __construct($user_email, $link, $name, $article, $price, $shipment, $value, $color, $size, $comment)
    {
        $this->user_email = $user_email;
        $this->link = $link;
        $this->name = $name;
        $this->article = $article;
        $this->price = $price;
        $this->shipment = $shipment;
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
        return $this
        ->view('emails.emailOrderWithHelp')
        ->with([
            'user_email' => $this->user_email,
            'link' => $this->link,
            'name' => $this->name,
            'article' => $this->article,
            'price' => $this->price,
            'shipment' => $this->shipment,
            'value' => $this->value,
            'color' => $this->color,
            'size' => $this->size,
            'comment' => $this->comment,
        ])->subject('Новое письмо, заказать с нашей помощью');
    }
}
