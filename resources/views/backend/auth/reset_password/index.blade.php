<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide">
<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>Logfa-inverse</title>
    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="{{ asset('backend/img/favicon/favicon.ico') }}" />   
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('backend/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('backend/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/css/pages/page-auth.css') }}" />
    <script src="{{ asset('backend/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('backend/js/config.js') }}"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
            <!-- Register -->
                <div class="card">
                    <div class="card-body">
                    <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a class="app-brand-link gap-2">
                                <x-admin.logo/>
                                <span class="app-brand-text demo text-body fw-bolder">Sneat Admin</span>
                            </a>
                        </div>
                        <h4 class="mb-2">Reset Password</h4>
                        @include('backend.layouts.page_info')
                        <form id="formAuthentication" class="mb-3" action="{{ route('admin.reset-password.reset') }}" method="POST">
                            @csrf
                            <input type="hidden" name="admin_id" value="{{ $id }}">
                            <div class="mb-3 form-password-toggle">
                                <label for="email" class="form-label">Password</label>
                                <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password"
                                />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label for="email" class="form-label">Repeat your password</label>
                                <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password"
                                />
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>
                        @push('script')
                            {!! JsValidator::formRequest('App\Http\Requests\Auth\ResetPasswordRequest') !!}
                        @endpush
                    </div>
                </div>
            <!-- /Register -->
            </div>
        </div>
    </div>
    
    <script src="{{ asset('backend/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('backend/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('backend/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <!-- composer -->
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    <!-- Page JS -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    @stack('script')
</body>
</html>
