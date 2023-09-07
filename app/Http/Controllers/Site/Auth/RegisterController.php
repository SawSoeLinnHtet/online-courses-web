<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Auth\RegisterRequest;
use App\Jobs\Site\SendVerificationLinkEmail;

class RegisterController extends Controller
{
    public function index()
    {
        return view('site.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        $this->setResend($user);
        return redirect()->route('verification.sent');
    }

    public function setResend($user)
    {
        session(['resend' => ['id' => $user->id]]);
    }

}
