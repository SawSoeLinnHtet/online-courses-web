<?php

namespace App\Mail\Site;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reset_password_link = URL::temporarySignedRoute('site.reset-password', Carbon::now()->addMinutes(5), ['user_id' => $this->user->id]);

        return $this->subject('Forgot Password From EDUBIN')
        ->from('noreply@edubin.com')
        ->view(
            'site.email.forgot-password',
            [
                'reset_password_link' => $reset_password_link
            ]
        );
    }
}
