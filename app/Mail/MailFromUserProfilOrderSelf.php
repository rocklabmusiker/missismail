<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailFromUserProfilOrderSelf extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $theme;
    protected $text;
    protected $file;


    public function __construct($theme, $text, $file = null)
    {
        $this->theme = $theme;
        $this->text = $text;
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mailFromUserProfilOrderSelf')
        ->with([
            'theme' => $this->theme,
            'text' => $this->text,
            'file' => $this->file,
        ])->subject('Статус вашего заказа');
    }
}
