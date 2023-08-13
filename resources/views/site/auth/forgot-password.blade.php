@extends('site.layouts.auth-app')

@section('content')

<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{ asset('site/auth/images/signin-image.jpg') }}" alt="sing up image"></figure>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Enter your email to reset password</h2>
                <form method="POST" class="register-form" id="login-form" action="{{ route('site.forgot-password.send') }}">
                    @csrf
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i>Email</label>
                        <input type="email" name="email" id="your_name"/>
                    </div>
                    <div class="form-group form-button">
                        <button type="submit" class="form-submit" style="width: 100%">
                            Send Reset link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection