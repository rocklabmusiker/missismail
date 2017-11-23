<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailUserSupport extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $user_email;
    protected $theme;
    protected $text;
    protected $file;


    public function __construct($user_email, $theme, $text, $file = null)
    {
        $this->user_email = $user_email;
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
        return $this
        ->view('emails.emailUserSupport')
        ->with([
            'user_email' => $this->user_email,
            'theme' => $this->theme,
            'text' => $this->text,
            'file' => $this->file
        ])->subject('У клиента есть вопросы к поддержке');
    }
}
