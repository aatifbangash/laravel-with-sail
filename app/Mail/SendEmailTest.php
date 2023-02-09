<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * $ sail artisan make:mail SendEmailTest // following command is used to create the email template
 *  - set the MAIL_DRIVER setting in the .env file first
 */
class SendEmailTest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     * ->view("email_templates"); is used to load the email template from the view
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.templates.test');
    }
}
