<?php

namespace App\Mail\Site;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationLinkMail extends Mailable
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
        $verification_link_url = URL::temporarySignedRoute('verification.verify', Carbon::now()->addMinutes(5), ['user_id' => $this->user->id]);

        return $this->subject('Email Verification Link From EDUBIN')
        ->from('noreply@edubin.com')
        ->view(
            'site.email.verification',
            [
                'verification_link_url' => $verification_link_url,
                'user' => $this->user
            ]
        );
    }
}
