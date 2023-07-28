<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $admin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admin)
    {
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $password_reset_link = URL::temporarySignedRoute(
                'admin.reset-password.index',
                Carbon::now()->addMinutes(5),
                ['admin_id' => $this->admin->id]
            );

        return $this->subject('Forgot Password From Sneat')
            ->from('noreply@sneatteam.com')
            ->view(
                'backend.email.forgot_password',
                [
                    'password_reset_link' => $password_reset_link
                ]
            );
    }
}
