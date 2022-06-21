<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        return $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $form_name ="MonDal DB";
        $form_mail ="mondalbd@gmail.com";
        $subject = "Contact Mail";
        return $this->form($form_name,$form_mail)
        ->view('mail.contact')->subject('Contact Message');
    }
}
