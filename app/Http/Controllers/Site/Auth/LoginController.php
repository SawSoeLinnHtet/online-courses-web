<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Site\Auth\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        $remember = isset($request->remember) && $request->remember == 'on' ? true : false;

        $user = User::where('email', $request->email)->first();

        if(isset($user)){
            if(!$user->hasVerifiedEmail()) {
                $this->setResend($user);

                return view('site.auth.request');
            }
        }
        
        if(Auth::attempt($credentials, $remember)){
            return redirect()->route('site.home');
        }

        return redirect()->route('site.get.login')->with('error', 'Your Credentials does not match');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('site.get.login')->with('success', 'Successfully Logged Out');
    }

    private function setResend($user)
    {
        session(['resend' => ['id' => $user->id]]);
    }
    
}
