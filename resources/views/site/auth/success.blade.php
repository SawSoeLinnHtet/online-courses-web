@extends('site.layouts.auth-app')

@section('content')

<section class="advenced-wrap">
    <div class="container">
        <div class="verify-wrap">
            <h3 class="header">
                Verified Successfully
            </h3>
            <img src="{{ asset('site/auth/images/success.gif') }}" alt="" class="web-animation" style="width: 150px !important">
            <p class="details">
                You have been verified email successfully. Please sign in to see our contents. 
            </p>
            <strong class="web-link">
                edubinonlinelearning.net
            </strong>
            <a href="{{ route('site.get.login') }}" class="btn success-btn">
                Sign In Here
            </a>
        </div>
    </div>
</section>

@endsection