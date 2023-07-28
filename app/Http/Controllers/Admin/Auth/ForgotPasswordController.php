<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendForgotPasswordEmail;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('backend.auth.forgot_password.index');
    }

    public function sendEmail(Request $request)
    {        
        $attributes = $request->validate(['email' => 'required|email']);

        $admin = Admin::where('email', $request->email)->first();

        if(is_null($admin)){
            return back()->with('email_error', 'Your email cannot be found');
        }

        SendForgotPasswordEmail::dispatch($admin);
        
        return back()->with('email_success', '`Email Sent! Check Your Mail Inbox`');
    }
}
