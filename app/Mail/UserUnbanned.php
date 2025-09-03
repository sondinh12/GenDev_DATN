<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserUnbanned extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Tạo một instance mới.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Xây dựng nội dung email.
     */
    public function build()
    {
        return $this->subject('Tài khoản của bạn đã được mở khóa')
            ->view('emails.user_unbanned');
    }
}
