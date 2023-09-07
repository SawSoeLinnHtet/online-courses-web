@extends('site.layouts.app')

@section('content')

<section class="sign-in">
    <div class="container d-flex align-items-center justify-content-start">
        <div class="p-5">
            <div class="signin-form" style="width: 400px">
                <h2 class="form-title mb-3">Sign up</h2>
                @include('site.layouts.auth-page-info')
                <form method="POST" class="register-form" id="register-form" action="{{ route('site.post.register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group pt-3">
                        <label for="your_name">Email address</label>
                        <input type="email" class="form-control" name="email" id="your_name" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group pt-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group pt-3">
                        <label for="re-pass">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" id="re_pass"  aria-describedby="emailHelp">
                    </div>

                    <div class="form-group form-button pt-3">
                        <button type="submit" class="form-submit w-100 border-none btn btn-md" style="background-color: #FFC600">
                            Sign Up
                        </button>
                    </div>
                    <div class="form-group form-button pt-3">
                        <span>Already account?</span> 
                        <a href="{{ route('site.get.login') }}">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Site\Auth\RegisterRequest') !!}
@endpush
@endsection