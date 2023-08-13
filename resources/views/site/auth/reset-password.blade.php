@extends('site.layouts.auth-app')

@section('content')

<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Set your new password</h2>
                <form method="POST" class="register-form" id="register-form" action="{{ route('site.reset-password.reset') }}">
                    @csrf
                    <input type="hidden" name="admin_id" value="{{ $id }}">
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i>Password</label>
                        <input type="password" name="password" id="pass"/>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i>Password Confirmation</label>
                        <input type="password" name="password_confirmation" id="re_pass"/>
                    </div>

                    <div class="form-group form-button">
                        <button type="submit" id="signup" class="form-submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{ asset('site/auth/images/signup-image.jpg') }}" alt="sing up image"></figure>
                <a href="#" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>
@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Auth\ResetPasswordRequest') !!}
@endpush
@endsection