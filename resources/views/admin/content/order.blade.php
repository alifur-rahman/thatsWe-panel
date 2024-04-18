@extends('layouts.admin-layout')
@section('title', 'Content Orders')
@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/editors/quill/quill.bubble.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
    <!-- datatable -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@stop
<!-- BEGIN: page css -->
@section('page-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/forms/form-quill-editor.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/forms/form-validation.css') }}">
    <style>
        .char-textarea {
            height: 22rem !important;
        }

        .long_widht_button {
            padding: 0.786rem 5.5rem;
        }
    </style>

@stop
<!-- END: page css -->
<!-- BEGIN: content -->
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">

            <div class="content-body">
                <section id="vertical-tabs">
                    <div class="row match-height">
                        <!-- Vertical Left Tabs start -->
                        <div class="col-xl-8 col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Order Page Contents</h4>
                                </div>
                                <form action="{{ route('content.order.submit') }}" method="post" id="form-add-success"
                                    onsubmit="return false">
                                    @csrf
                                    <div class="card-body">
                                        <div class="nav-vertical">
                                            <ul class="nav nav-tabs nav-left flex-column" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="baseVerticalLeft-english"
                                                        data-bs-toggle="tab" aria-controls="english" href="#english"
                                                        role="tab" aria-selected="true">English</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-deutsch" data-bs-toggle="tab"
                                                        aria-controls="deutsch" href="#deutsch" role="tab"
                                                        aria-selected="false">Deutsch</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-francais" data-bs-toggle="tab"
                                                        aria-controls="francais" href="#francais" role="tab"
                                                        aria-selected="false">Français
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-espanol" data-bs-toggle="tab"
                                                        aria-controls="espanol" href="#espanol" role="tab"
                                                        aria-selected="false">Español
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-turkce" data-bs-toggle="tab"
                                                        aria-controls="turkce" href="#turkce" role="tab"
                                                        aria-selected="false">Türkçe
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-italiano"
                                                        data-bs-toggle="tab" aria-controls="italiano" href="#italiano"
                                                        role="tab" aria-selected="false">Italiano
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-portugues"
                                                        data-bs-toggle="tab" aria-controls="portugues" href="#portugues"
                                                        role="tab" aria-selected="false">Português
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-dansk" data-bs-toggle="tab"
                                                        aria-controls="dansk" href="#dansk" role="tab"
                                                        aria-selected="false">Dansk
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-nederlands"
                                                        data-bs-toggle="tab" aria-controls="nederlands"
                                                        href="#nederlands" role="tab"
                                                        aria-selected="false">Nederlands
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="english" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-english">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-en" rows="5" placeholder="Write In English"
                                                            name="txt_en">{{ optional($coOrderInfo)->txt_en }}</textarea>
                                                        <label for="textarea-Desc-en">Write
                                                            In English</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="deutsch" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-deutsch">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-de" rows="5" placeholder="Write In Deutsch"
                                                            name="txt_de">{{ optional($coOrderInfo)->txt_de }}</textarea>
                                                        <label for="textarea-Desc-de">Write
                                                            In Deutsch</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="francais" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-francais">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-fr" rows="5" placeholder="Write In Français"
                                                            name="txt_fr">{{ optional($coOrderInfo)->txt_fr }}</textarea>
                                                        <label for="textarea-Desc-fr">Write
                                                            In Français</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="espanol" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-espanol">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-es" rows="5" placeholder="Write In Español"
                                                            name="txt_es">{{ optional($coOrderInfo)->txt_es }}</textarea>
                                                        <label for="textarea-Desc-fr">Write
                                                            In Español</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="turkce" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-turkce">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-tr" rows="5" placeholder="Write In Türkçe"
                                                            name="txt_tr">{{ optional($coOrderInfo)->txt_tr }}</textarea>
                                                        <label for="textarea-Desc-fr">Write
                                                            In Türkçe</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="italiano" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-italiano">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-it" rows="5" placeholder="Write In Italiano"
                                                            name="txt_it">{{ optional($coOrderInfo)->txt_it }}</textarea>
                                                        <label for="textarea-Desc-it">Write
                                                            In Italiano</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="portugues" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-portugues">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-pt" rows="5" placeholder="Write In Português"
                                                            name="txt_pt">{{ optional($coOrderInfo)->txt_pt }}</textarea>
                                                        <label for="textarea-Desc-pt">Write
                                                            In Português</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="dansk" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-dansk">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-da" rows="5" placeholder="Write In Dansk"
                                                            name="txt_da">{{ optional($coOrderInfo)->txt_da }}</textarea>
                                                        <label for="textarea-Desc-da">Write
                                                            In Dansk</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="nederlands" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-nederlands">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-nl" rows="5" placeholder="Write In Nederlands"
                                                            name="txt_nl">{{ optional($coOrderInfo)->txt_nl }}</textarea>
                                                        <label for="textarea-Desc-nl">Write
                                                            In Nederlands</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-end align-items-center">
                                            <button type="submit" id="add-success"
                                                class="btn btn-primary waves-effect waves-float waves-light long_widht_button"
                                                onclick="_run(this)" data-el="fg" data-form="form-add-success"
                                                data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
                                                data-callback="addSuccessCallBack" data-btnid="add-success">Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Vertical Left Tabs ends -->
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Guidelines</h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">This section manages the content of the order pages: <a
                                            href="https://thatswe.de/order" target="_blank">www.thatswe.de/order</a>. If
                                        you need to change the content of the order page in every language, simply make
                                        changes in the "from" field in every language.</p>
                                    <div class="demo-spacing-0">
                                        <div class="alert alert-info" role="alert">
                                            <h4 class="alert-heading">Basic Steps :</h4>
                                            <div class="alert-body">
                                                <p class="card-text mb-1"> 1. Select language from dropdown list.</p>
                                                <p class="card-text mb-1"> 2. Write/changes in the corresponding language
                                                    on the textarea
                                                </p>
                                                <p class="card-text  mb-1"> 3. Click on "Submit" button. </p>
                                                <p class="card-text mb-1"> 4. You will get a success message.</p>
                                                <p class="card-text mb-1"> 5. Go <a href="https://thatswe.de/order"
                                                        target="_blank">www.thatswe.de/order</a> and reload to see the
                                                    Changes</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

            </div>
        </div>
    </div>



@stop
<!-- BEGIN: vendor JS -->
@section('vendor-js')
    <script src="{{ asset('admin-assets/app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
@stop
<!-- END: vendor JS -->
<!-- BEGIN: Page vendor js -->
@section('page-vendor-js')

    <script src="{{ asset('admin-assets/app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>

    <script src="{{ asset('admin-assets/app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <!-- datatable -->
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>

    <script type="text/javascript" language="javascript"
        src="{{ asset('admin-assets/app-assets/js/scripts/tables/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" language="javascript"
        src="{{ asset('admin-assets/app-assets/js/scripts/tables/jszip.min.js') }}"></script>
    <!-- <script type="text/javascript" language="javascript"
        src="{{ asset('admin-assets/app-assets/js/scripts/tables/buttons.flash.min.js') }}"></script> -->
    <script type="text/javascript" language="javascript"
        src="{{ asset('admin-assets/app-assets/js/scripts/tables/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" language="javascript"
        src="{{ asset('admin-assets/app-assets/js/scripts/tables/buttons.print.min.js') }}"></script>

    <script src="{{ asset('admin-assets/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@stop
<!-- END: page vendor js -->
<!-- BEGIN: page JS -->
@section('page-js')
    {{-- <script src="{{ asset('admin-assets/app-assets/js/scripts/pages/activity-log.js') }}"></script> --}}
    <script src="{{ asset('admin-assets/app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script>
        function addSuccessCallBack(data) {
            $('#add-success').prop('disabled', false);
            if (data.status == true) {
                notify('success', data.message, 'Add Order Content');
                // $('#form-add-success')[0].reset();
            } else {
                if (data.message != null) {
                    notify('error', data.message, 'Add Order Content');
                    $.validator("form-add-success", data.errors);

                } else {
                    notify('error', 'Something Went Wrong!', 'Add Order Content');
                    $.validator("form-add-success", data.errors);
                }
            }
        }
    </script>

@stop
<!-- BEGIN: page JS -->
