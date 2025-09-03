<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;

    /**
     * Create a new message instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Đặt lại mật khẩu')
            ->view('emails.reset-password')
            ->with([
                'token' => $this->token,
                'resetUrl' => route('password.reset', ['token' => $this->token])
            ]);
    }
}
