@extends('layouts.admin-auth')
@section('title', 'Admin Login')
@section('content')
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
            <!-- Brand logo-->
            <a class="brand-logo" href="/">
                <img src="{{ asset('logo3.png') }}" height="60" alt="{{ config('app.name') }}">
            </a>
            <!-- /Brand logo-->
            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-2">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid"
                        src="{{ asset('admin-assets/images/bg/auth-cover.svg') }}" alt="Login V2" /></div>
            </div>
            <!-- /Left Text-->
            <!-- Login-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <!-- start admin login header -->
                    <h2 class="card-title fw-bold mb-1 admin-login-form">Welcome to WhatsWE! </h2>
                    <p class="card-text mb-2 admin-login-form">Please sign-in to your account and start the adventure</p>

                    @if (session('login-success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('login-success') }}
                        </div>
                    @endif
                    <div id="alert-message" class="alert alert-danger p-1 d-none" role="alert">

                    </div>
                    <!-- end admin login header -->

                    <!-- start admin login body -->
                    <form class="auth-login-form mt-2 admin-login-form" action="{{ route('login') }}" method="POST"
                        enctype="multipart/form-data" id="admin-login-form">
                        @csrf
                        <div class="mb-1">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control email" type="text" name="email" placeholder="john@example.com"
                                aria-describedby="email" autofocus="" tabindex="1" />
                        </div>
                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge password" type="password" name="password"
                                    placeholder="············" aria-describedby="password" tabindex="2" /><span
                                    class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                            <div class="d-flex justify-content-between"></div>
                        </div>
                        <input type="hidden" name="request_form" value="login_form">
                        <div class="mb-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember_me" name="remember_me">
                                <label class="form-check-label" for="remember-me"> Remember Me</label>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary w-100" id="loginBtn" onclick="_run(this)"
                            data-el="fg" data-form="admin-login-form"
                            data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
                            data-callback="adminLoginCallBack" data-btnid="loginBtn">Sign In</button>
                    </form>
                    <!-- end admin login main -->
                </div>
            </div>
            <!-- /Login-->
        </div>
    </div>
@stop
@section('page-js')
    <!-- BEGIN: Page JS-->
    <script>
        // trader login
        function adminLoginCallBack(data) {
            $('#loginBtn').prop('disabled', false);
            if (data.status == true) {
                notify('success', data.message, 'Admin Login');
                setTimeout(function() {
                    window.location.href = "{{ route('dashboard') }}";
                }, 1000 * 2);

            } else {
                if (data.message != null) {
                    notify('error', data.message, 'Admin Login');
                    $.validator("admin-login-form", data.errors);
                } else {
                    notify('error', 'Something Went Wrong!', 'Admin Login');
                    $.validator("admin-login-form", data.errors);
                }
            }
        }
    </script>
    <!-- END: Page JS-->
@stop
