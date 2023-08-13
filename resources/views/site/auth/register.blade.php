@extends('site.layouts.auth-app')

@section('content')

<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                @include('site.layouts.auth-page-info')
                <form method="POST" class="register-form" id="register-form" action="{{ route('site.post.register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i>Name</label>
                        <input type="text" name="name" id="name"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i>Email</label>
                        <input type="email" name="email" id="email"/>
                    </div>
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
                <a href="{{ route('site.get.login') }}" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>
@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Site\Auth\RegisterRequest') !!}
@endpush
@endsection