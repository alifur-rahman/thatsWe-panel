@extends('app')

@section('content')
    <section class="py-7 py-lg-8" id="home">
        {{-- <div class="bg-holder"
        style="background-image: url( {{ asset('assets/img/illustration/2.png') }}  ); background-position: center center; background-size: cover; background-repeat: no-repeat; height: 100vh;">

    </div> --}}
        <!--/.bg-holder-->

        <div class="bg-holder d-xxl-block hero-bg"
            style="background-image: url({{ asset('assets/img/illustration/220.png') }} ); background-position: right top; background-size: cover; height: 100vh;">

        </div>
        <!--/.bg-holder-->

        <div class="container">
            <div class="row align-items-center h-100 justify-content-center justify-content-lg-start">
                <div class="col-md-6 col-xxl-5 text-md-start text-center pb-3">
                    <h1 class="fw-bold" style="line-height: 1.0;color: #323D9A;">{{ __('messages.welcome2') }}</h1>
                    <p class="fs-5 fw-bolder" style="color: #323D9A;">{{ __('messages.fulfill') }}</p>
                    <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-md-start ">
                        <a class="btn btn-sm btn-primary me-1 mb-1 mb-sm-0" href="{{ url('/offer') }}"
                            role="button">{{ __('messages.get_info') }}</a>
                        <a class="btn btn-sm btn-primary me-1" href="{{ url('/recommendation') }}"
                            role="button">{{ __('messages.recommendation') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col-md-5 col-xxl-5">
                    <h2 style="color: black; margin-bottom:0;">{{ __('messages.about_us') }}</h2>
                    <p>
                        {{ __('messages.about_us_description') }}
                    </p>
                </div>
            </div>

        </div>
    </section>

    {{-- <section id="product" style="background-color: #6f42c1; color: white;">
    <div class="container text-center">
        <h2 style="color: white">{{ __('messages.about_us') }}</h2>
        <p>
            {{ __('messages.about_us_description') }}
        </p>
    </div>
    <!-- end of .container-->
</section> --}}
@endsection


@section('styles')
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100vh;
            overflow-x: hidden;
            overflow-y: hidden;
        }
    </style>
@endsection
