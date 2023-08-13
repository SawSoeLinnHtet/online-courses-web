<div class="header-logo-support pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="logo">
                    <a href="index-2.html">
                        <img src="{{ asset('site/images/logo.png') }}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="support-button float-right d-none d-md-block">
                    <div class="support float-left">
                        <div class="icon">
                            <img src="{{ asset('site/images/all-icon/support.png') }}" alt="icon">
                        </div>
                        <div class="cont">
                            <p>Need Help? call us free</p>
                            <span>321 325 5678</span>
                        </div>
                    </div>
                    <div class="button float-left">
                        @if(!auth()->check())
                            <a href="{{ route('site.get.register') }}" class="main-btn">Join Now</a>
                        @else
                            <a href="#" class="mt-3 d-flex align-items-center">
                                <i class="fa fa-user mr-2 text-info" style="font-size: 30px" aria-hidden="true"></i>
                                {{ auth()->user()->name }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>