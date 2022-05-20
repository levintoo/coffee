<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
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
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.otp-mail')
            ->with([
                'username' => 'username',
                'actionText' => 'validate',
                'actionUrl' => route('twofactor'),
                'displayableActionUrl' => route('twofactor'),
                'otp' => '1234',
            ]);
    }
}
