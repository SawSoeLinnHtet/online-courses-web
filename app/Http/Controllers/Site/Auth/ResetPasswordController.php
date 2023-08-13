<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\Site\SendResetPasswordEmail;
use App\Http\Requests\Auth\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->hasValidSignature()) {
            return redirect()
                ->route('site.forgot-password')
                ->with('email_error', 'Invalid reset password link.');
        }

        $user = User::find($request->user_id);

        if (is_null($user)) {
            return redirect()
                ->route('site.forgot-password')
                ->with('email_error', 'Email cannot found');
        }

        return view('site.auth.reset-password', ['id' => $request->user_id]);
    }

    public function reset(ResetPasswordRequest $request)
    {
        $user = User::findOrFail($request->admin_id);

        $user->update(['password' => $request->password]);

        SendResetPasswordEmail::dispatch($user);

        return redirect()->route('site.get.login')->with('success', 'Your password is successfully reset');
    }
}
