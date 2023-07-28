<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Jobs\SendResetPasswordEmail;

class ResetPasswordController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->hasValidSignature()){
            return redirect()
                ->route('admin.forgot-password.index')
                ->with('email_error', 'Invalid reset password link.');
        }

        $admin = Admin::find($request->admin_id);

        if(is_null($admin)) {
            return redirect()
                ->route('admin.forgot-password.index')
                ->with('email_error', 'Email cannot found');
        }

        return view('backend.auth.reset_password.index', ['id' => $request->admin_id]);
    }

    public function reset(ResetPasswordRequest $request)
    {
        $admin = Admin::findOrFail($request->admin_id);

        $admin->update(['password' => $request->password]);

        SendResetPasswordEmail::dispatch($admin);
        
        return redirect()->route('admin.login.index')->with('success', 'Your password is successfully reset');
    }
}
