<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $input;
    public $cart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input,$data,$cart)
    {
        $this->input = $input;
        $this->data = $data;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $form_name = "MonDal BD";
        $form_email = "mondalbd@gmail.com";
        $subject = "Greet News You get an Order";
        return $this->from($form_email,$form_name)
    
        ->view('mail.admin_order')->subject($subject);
    }
}
