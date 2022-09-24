<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class Sendmail extends Mailable
{
    use Queueable, SerializesModels;
     public $body;
     public $sub;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($e_sub,$e_body)
    {
        $this->body=$e_body;
        $this->sub;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.template')
        ->with('body',$this->body)
        ->with('sub',$this->sub);

    }
}
