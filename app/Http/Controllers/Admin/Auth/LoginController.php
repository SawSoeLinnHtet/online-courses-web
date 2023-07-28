<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.auth.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|between:8,20'
        ]);

        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.dashboard');
        };

        return redirect()->route('admin.login.index')->with('error', 'Credentials not match with our records');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login.index')->with('success', 'Successfully Logged out');
    }
}
