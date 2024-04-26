<?php

namespace Hellodit\CustomerProduct\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class SuccessVerifyOtp extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {

    }

    /**
     * Create a new message instance.
     *
     */

    public function build()
    {
        return $this->subject('Success Verify OTP')
            ->view('emails.success-verify-otp');
    }
}

