<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $messageBody;

    /**
     * Create a new message instance.
     *
     * @param string $name
     * @param string $email
     * @param string|null $phone
     * @param string $messageBody
     */
    public function __construct($name, $email, $phone, $messageBody)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->messageBody = $messageBody;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Contact Inquiry: ' . $this->name)
                    ->view('emails.admin_contact_notification');
    }
}
