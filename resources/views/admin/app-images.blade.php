@extends('layouts.admin-layout')
@section('title', 'Content | Images From ThatWE App')

@section('vendor-css')
@stop
<!-- BEGIN: Page CSS-->
@section('page-css')

@stop
<!-- END: Page CSS-->
<!-- BEGIN: Content-->
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Accommodation</h4>

                                <img class="img-fluid my-2"
                                    src="https://thatswe.de/public/assets/img/screen-logo/3-Accommodation.png"
                                    alt="Accommodation">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
<!-- END: Content-->

@section('page-js')
    // STATIC
@endsection
