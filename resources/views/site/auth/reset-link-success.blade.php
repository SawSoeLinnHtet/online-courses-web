@extends('site.layouts.auth-app')

@section('content')

<section class="advenced-wrap">
    <div class="container">
        <div class="verify-wrap">
            <h3 class="header">
                Reset Password Link Sent Successfully
            </h3>
            <img src="{{ asset('site/auth/images/sent.gif') }}" alt="" class="web-animation" style="width: 150px !important">
            <p class="details">
                Your reset Password Link is successfully sent. Please check your email and click to verify.
            </p>
            <strong class="web-link">
                edubinonlinelearning.net
            </strong>
            <span class="warning">
                This link will expire in next 5 minutes. Thank You. 
            </span>
        </div>
    </div>
</section>

@endsection