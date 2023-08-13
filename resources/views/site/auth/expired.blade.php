@extends('site.layouts.auth-app')

@section('content')

<section class="advenced-wrap">
    <div class="container">
        <div class="verify-wrap">
            <h3 class="header">
                Email Verificatin Link Expired
            </h3>
            <img src="{{ asset('site/auth/images/expre.gif') }}" alt="" class="web-animation" style="width: 200px !important">
            <p class="details">
                Looks like the verification link has expired.
                Not to worry, we can send the link again. 
            </p>
            <strong class="web-link">
                edubinonlinelearning.net
            </strong>
            <a href="{{ route('verification.resend') }}" class="btn send-btn">
                Resend Verification Email
            </a>
        </div>
    </div>
</section>

@endsection