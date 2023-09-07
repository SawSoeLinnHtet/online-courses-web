@extends('site.layouts.app')

@section('content')

<section class="sign-in">
    <div class="container d-flex align-items-center justify-content-start">
        <div class="p-5">
            <div class="signin-form" style="width: 400px">
                <h2 class="form-title mb-5">Sign In</h2>
                @include('site.layouts.auth-page-info')
                <form method="POST" class="register-form" id="login-form" action="{{ route('site.post.login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="your_name">Email address</label>
                        <input type="email" class="form-control" name="email" id="your_name" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group pt-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group pt-2" style="display: flex; justify-content: space-between">
                        <div>
                            <input type="checkbox" name="remember" id="remember"/>
                            <label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>

                        <a href="{{ route('site.forgot-password') }}" style="color: blue">Forgot Password?</a>
                    </div>
                    <div class="form-group form-button pt-3">
                        <button type="submit" class="form-submit w-100 border-none btn btn-md" style="background-color: #FFC600">
                            Sign in
                        </button>
                    </div>
                    <div class="form-group form-button pt-3">
                        <span>New User?</span> 
                        <a href="{{ route('site.get.register') }}">Register here</a>
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