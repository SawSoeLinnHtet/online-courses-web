<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\Site\SendForgotPasswordEmail;
use App\Jobs\Site\SendResetPasswordEmail;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('site.auth.forgot-password');
    }

    public function sendEmail(Request $request)
    {
        $attributes = $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (is_null($user)) {
            return back()->with('email_error', 'Your email cannot be found');
        }

        SendForgotPasswordEmail::dispatch($user);

        return view('site.auth.reset-link-success');
    }
}
