<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\Site\SendVerificationLinkEmail;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {
        if (!$request->hasValidSignature()) {
            return view('site.auth.expired');
        }

        $user = User::findOrFail($request->user_id);

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('site.login.index');
        }

        $user->markEmailAsVerified();

        $this->destroyResend();

        return redirect()->route('verification.success');
    }

    public function request()
    {
        return view('site.auth.request');
    }

    public function sent()
    {
        $user = User::findOrFail(session('resend')['id']);

        SendVerificationLinkEmail::dispatch($user);

        return view('site.auth.sent');
    }

    public function resend()
    {
        $user = User::findOrFail(session('resend')['id']);

        SendVerificationLinkEmail::dispatch($user);

        return view('site.auth.sent');
    }

    public function success()
    {
        return view('site.auth.success');
    }

    public function expired()
    {
        return view('site.auth.expired');
    }

    private function destroyResend()
    {
        session()->forget('resend');
    }
}
