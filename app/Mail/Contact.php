<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $sender_name;
    public $mail;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender_name,$mail)
    {
        $this->sender_name = $sender_name;
        $this->mail = $mail;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("chatbimdev@gmail.com")
                ->view('emails.contact');
    }
}
