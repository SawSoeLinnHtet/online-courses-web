@extends('site.layouts.app')

@section('content')

<section class="sign-in">
    <div class="container d-flex align-items-center justify-content-start">
        <div class="p-5">
            <div class="signin-form" style="width: 400px">
                <h2 class="form-title">Enter your email to reset password</h2>
                <form method="POST" class="register-form" id="login-form" action="{{ route('site.forgot-password.send') }}">
                    @csrf
                    <div class="form-group pt-3">
                        <label for="your_name">Email address</label>
                        <input type="email" class="form-control" name="email" id="your_name" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group form-button pt-3">
                        <button type="submit" class="form-submit w-100 border-none btn btn-md" style="background-color: #FFC600">
                            Send Reset link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection