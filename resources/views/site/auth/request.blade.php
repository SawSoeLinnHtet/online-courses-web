@extends('site.layouts.auth-app')

@section('content')

<section class="advenced-wrap">
    <div class="container">
        <div class="verify-wrap">
            <h3 class="header">
                Plese Verify Your Email Address First
            </h3>
            <img src="{{ asset('site/auth/images/please-verify.gif') }}" alt="" class="web-animation">
            <p class="details"> 
                To continue using EDUBIN, please verify your email address:
            </p>
            <strong class="web-link">
                edubinonlinelearning.net
            </strong>
            <a href="{{ route('verification.sent') }}" class="btn send-btn">
                Send Verification Email
            </a>
        </div>
    </div>
</section>

@endsection