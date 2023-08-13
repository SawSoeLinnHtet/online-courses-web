@extends('site.layouts.auth-app')

@section('content')

<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{ asset('site/auth/images/signin-image.jpg') }}" alt="sing up image"></figure>
                <a href="{{ route('site.get.register') }}" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Sign In</h2>
                @include('site.layouts.auth-page-info')
                <form method="POST" class="register-form" id="login-form" action="{{ route('site.post.login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i>Email</label>
                        <input type="email" name="email" id="your_name"/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i>Password</label>
                        <input type="password" name="password" id="your_pass"/>
                    </div>
                    <div class="form-group" style="display: flex; justify-content: space-between">
                        <div>
                            <input type="checkbox" name="remember"/>
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <a href="{{ route('site.forgot-password') }}" style="color: blue">Forgot Password?</a>
                    </div>
                    <div class="form-group form-button">
                        <button type="submit" class="form-submit">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Site\Auth\LoginRequest') !!}
@endpush
@endsection