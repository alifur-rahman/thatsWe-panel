@extends('layouts.admin-layout')
@section('title', 'Orders')
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

        .quill-toolbar.ql-toolbar.ql-snow {
            border-radius: 6px;
            margin-bottom: 5px;
            margin-top: 5px;
        }

        .aleditor.ql-container.ql-snow {
            height: 100%;
            min-height: 258px;
            border-radius: 6px;
        }

        .ql-toolbar.ql-snow .ql-formats {
            margin: 0;
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
                        <!-- Vertical Left Tabs ends -->
                        <div class=" col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Guidelines of Privacy Policy page</h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">This section manages the content of the Privacy Policy pages: <a
                                            href="https://thatswe.de/policy" target="_blank">www.thatswe.de/policy</a> and
                                        <a href="https://thatssoft.de/policy" target="_blank">www.thatssoft.de/policy</a>.
                                        If
                                        you need to change the content of the Privacy Policy in every language, simply make
                                        changes in the "from" field in every language. 'Data Protection' card will manage
                                        the
                                        Data Protection content. as same as 'Imprint'
                                    </p>
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
                                                <p class="card-text mb-1"> 5. Go <a href="https://thatswe.de/policy"
                                                        target="_blank">www.thatswe.de/policy</a> and <a
                                                        href="https://thatssoft.de/policy"
                                                        target="_blank">www.thatssoft.de/policy</a> and reload to see the
                                                    Changes</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Vertical Left Tabs start -->
                        <div class="col-xl-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Protection</h4>
                                </div>
                                <form action="{{ route('content.policy.submit') }}" method="post" id="form-dp-success"
                                    onsubmit="return false">
                                    @csrf
                                    <input type="hidden" name="type" value="dp">
                                    <div class="card-body">
                                        <div class="nav-vertical">
                                            <ul class="nav nav-tabs nav-left flex-column" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="baseVerticalLeft-english-dp"
                                                        data-bs-toggle="tab" aria-controls="english-dp" href="#english-dp"
                                                        role="tab" aria-selected="true">English</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-deutsch-dp"
                                                        data-bs-toggle="tab" aria-controls="deutsch-dp"
                                                        href="#deutsch-dp" role="tab"
                                                        aria-selected="false">Deutsch</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-francais-dp"
                                                        data-bs-toggle="tab" aria-controls="francais-dp"
                                                        href="#francais-dp" role="tab" aria-selected="false">Français
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-espanol-dp"
                                                        data-bs-toggle="tab" aria-controls="espanol-dp"
                                                        href="#espanol-dp" role="tab" aria-selected="false">Español
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-turkce-dp"
                                                        data-bs-toggle="tab" aria-controls="turkce-dp" href="#turkce-dp"
                                                        role="tab" aria-selected="false">Türkçe
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-italiano-dp"
                                                        data-bs-toggle="tab" aria-controls="italiano-dp"
                                                        href="#italiano-dp" role="tab" aria-selected="false">Italiano
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-portugues-dp"
                                                        data-bs-toggle="tab" aria-controls="portugues-dp"
                                                        href="#portugues-dp" role="tab"
                                                        aria-selected="false">Português
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-dansk-dp"
                                                        data-bs-toggle="tab" aria-controls="dansk-dp" href="#dansk-dp"
                                                        role="tab" aria-selected="false">Dansk
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-nederlands-dp"
                                                        data-bs-toggle="tab" aria-controls="nederlands-dp"
                                                        href="#nederlands-dp" role="tab"
                                                        aria-selected="false">Nederlands
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="english-dp" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-english-dp">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-en-dp" rows="5" placeholder="Write In English"
                                                            name="dp_en">{{ optional($coPolicyInfo)->dp_en }}</textarea>
                                                        <label for="textarea-Desc-en-dp">Write
                                                            In English</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="deutsch-dp" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-deutsch-dp">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-de-dp" rows="5" placeholder="Write In Deutsch"
                                                            name="dp_de">{{ optional($coPolicyInfo)->dp_de }}</textarea>
                                                        <label for="textarea-Desc-de-dp">Write
                                                            In Deutsch</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="francais-dp" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-francais-dp">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-fr-dp" rows="5" placeholder="Write In Français"
                                                            name="dp_fr">{{ optional($coPolicyInfo)->dp_fr }}</textarea>
                                                        <label for="textarea-Desc-fr-dp">Write
                                                            In Français</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="espanol-dp" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-espanol-dp">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-es-dp" rows="5" placeholder="Write In Español"
                                                            name="dp_es">{{ optional($coPolicyInfo)->dp_es }}</textarea>
                                                        <label for="textarea-Desc-fr-dp">Write
                                                            In Español</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="turkce-dp" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-turkce-dp">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-tr-dp" rows="5" placeholder="Write In Türkçe"
                                                            name="dp_tr">{{ optional($coPolicyInfo)->dp_tr }}</textarea>
                                                        <label for="textarea-Desc-tr-dp">Write
                                                            In Türkçe</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="italiano-dp" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-italiano-dp">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-it-dp" rows="5" placeholder="Write In Italiano"
                                                            name="dp_it">{{ optional($coPolicyInfo)->dp_it }}</textarea>
                                                        <label for="textarea-Desc-it-dp">Write
                                                            In Italiano</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="portugues-dp" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-portugues-dp">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-pt-dp" rows="5"
                                                            placeholder="Write In Português" name="dp_pt">{{ optional($coPolicyInfo)->dp_pt }}</textarea>
                                                        <label for="textarea-Desc-pt-dp">Write
                                                            In Português</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="dansk-dp" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-dansk-dp">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-da-dp" rows="5" placeholder="Write In Dansk"
                                                            name="dp_da">{{ optional($coPolicyInfo)->dp_da }}</textarea>
                                                        <label for="textarea-Desc-da-dp">Write
                                                            In Dansk</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="nederlands-dp" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-nederlands-dp">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-nl-dp" rows="5"
                                                            placeholder="Write In Nederlands" name="dp_nl">{{ optional($coPolicyInfo)->dp_nl }}</textarea>
                                                        <label for="textarea-Desc-nl-dp">Write
                                                            In Nederlands</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-end align-items-center">
                                            <button type="submit" id="dp-success"
                                                class="btn btn-primary waves-effect waves-float waves-light long_widht_button"
                                                onclick="_run(this)" data-el="fg" data-form="form-dp-success"
                                                data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
                                                data-callback="DpSuccessCallBack" data-btnid="dp-success">Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Vertical Left Tabs ends -->

                        <!-- Vertical Right Tabs start -->
                        <div class="col-xl-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Imprint</h4>

                                </div>


                                <form action="{{ route('content.policy.submit') }}" method="post" id="form-im-success"
                                    onsubmit="return false">
                                    @csrf
                                    <input type="hidden" name="type" value="im">
                                    <div class="card-body">


                                        <div class="nav-vertical">
                                            <ul class="nav nav-tabs nav-right flex-column" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="baseVerticalLeft-english"
                                                        data-bs-toggle="tab" aria-controls="english" href="#english"
                                                        role="tab" aria-selected="true">English</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-deutsch"
                                                        data-bs-toggle="tab" aria-controls="deutsch" href="#deutsch"
                                                        role="tab" aria-selected="false">Deutsch</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-francais"
                                                        data-bs-toggle="tab" aria-controls="francais" href="#francais"
                                                        role="tab" aria-selected="false">Français
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseVerticalLeft-espanol"
                                                        data-bs-toggle="tab" aria-controls="espanol" href="#espanol"
                                                        role="tab" aria-selected="false">Español
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
                                            <div class="tab-content" id="alEditorWrapper">
                                                <div class="tab-pane active " id="english" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-english">
                                                    <label for="textarea-Desc-en">Write
                                                        In English</label>
                                                    <div class="quill-toolbar">
                                                        <span class="ql-formats">
                                                            <select class="ql-header">
                                                                <option value="1">Heading</option>
                                                                <option value="2">Subheading</option>
                                                                <option selected>Normal</option>
                                                            </select>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-bold"></button>
                                                            <button class="ql-italic"></button>
                                                            <button class="ql-underline"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-list" value="ordered"></button>
                                                            <button class="ql-list" value="bullet"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-link"></button>
                                                        </span>

                                                        <span class="ql-formats">
                                                            <button class="ql-clean"></button>
                                                        </span>
                                                    </div>
                                                    <div class="form-floating mb-0">
                                                        <input type="hidden" name="im_en"
                                                            value="{{ optional($coPolicyInfo)->im_en }}">
                                                        <div class="aleditor">{!! optional($coPolicyInfo)->im_en !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="deutsch" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-deutsch">
                                                    <label for="textarea-Desc-de">Write
                                                        In Deutsch</label>
                                                    <div class="quill-toolbar">
                                                        <span class="ql-formats">
                                                            <select class="ql-header">
                                                                <option value="1">Heading</option>
                                                                <option value="2">Subheading</option>
                                                                <option selected>Normal</option>
                                                            </select>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-bold"></button>
                                                            <button class="ql-italic"></button>
                                                            <button class="ql-underline"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-list" value="ordered"></button>
                                                            <button class="ql-list" value="bullet"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-link"></button>
                                                        </span>

                                                        <span class="ql-formats">
                                                            <button class="ql-clean"></button>
                                                        </span>
                                                    </div>
                                                    <div class="form-floating mb-0">
                                                        <input type="hidden" name="im_de"
                                                            value="{{ optional($coPolicyInfo)->im_de }}">

                                                        <div class="aleditor">{!! optional($coPolicyInfo)->im_de !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="francais" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-francais">
                                                    <label for="textarea-Desc-fr">Write
                                                        In Français</label>
                                                    <div class="quill-toolbar">
                                                        <span class="ql-formats">
                                                            <select class="ql-header">
                                                                <option value="1">Heading</option>
                                                                <option value="2">Subheading</option>
                                                                <option selected>Normal</option>
                                                            </select>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-bold"></button>
                                                            <button class="ql-italic"></button>
                                                            <button class="ql-underline"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-list" value="ordered"></button>
                                                            <button class="ql-list" value="bullet"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-link"></button>
                                                        </span>

                                                        <span class="ql-formats">
                                                            <button class="ql-clean"></button>
                                                        </span>
                                                    </div>
                                                    <div class="form-floating mb-0">

                                                        <input type="hidden" name="im_fr"
                                                            value="{{ optional($coPolicyInfo)->im_fr }}">
                                                        <div class="aleditor">{!! optional($coPolicyInfo)->im_fr !!}
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="espanol" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-espanol">
                                                    <label for="textarea-Desc-fr">Write
                                                        In Español</label>
                                                    <div class="quill-toolbar">
                                                        <span class="ql-formats">
                                                            <select class="ql-header">
                                                                <option value="1">Heading</option>
                                                                <option value="2">Subheading</option>
                                                                <option selected>Normal</option>
                                                            </select>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-bold"></button>
                                                            <button class="ql-italic"></button>
                                                            <button class="ql-underline"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-list" value="ordered"></button>
                                                            <button class="ql-list" value="bullet"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-link"></button>
                                                        </span>

                                                        <span class="ql-formats">
                                                            <button class="ql-clean"></button>
                                                        </span>
                                                    </div>
                                                    <div class="form-floating mb-0">
                                                        <input type="hidden" name="im_es"
                                                            value="{{ optional($coPolicyInfo)->im_es }}">
                                                        <div class="aleditor">{!! optional($coPolicyInfo)->im_es !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="turkce" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-turkce">
                                                    <label for="textarea-Desc-fr">Write
                                                        In Türkçe</label>
                                                    <div class="quill-toolbar">
                                                        <span class="ql-formats">
                                                            <select class="ql-header">
                                                                <option value="1">Heading</option>
                                                                <option value="2">Subheading</option>
                                                                <option selected>Normal</option>
                                                            </select>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-bold"></button>
                                                            <button class="ql-italic"></button>
                                                            <button class="ql-underline"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-list" value="ordered"></button>
                                                            <button class="ql-list" value="bullet"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-link"></button>
                                                        </span>

                                                        <span class="ql-formats">
                                                            <button class="ql-clean"></button>
                                                        </span>
                                                    </div>
                                                    <div class="form-floating mb-0">
                                                        <input type="hidden" name="im_tr"
                                                            value="{{ optional($coPolicyInfo)->im_tr }}">
                                                        <div class="aleditor">{!! optional($coPolicyInfo)->im_tr !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="italiano" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-italiano">
                                                    <label for="textarea-Desc-it">Write
                                                        In Italiano</label>
                                                    <div class="quill-toolbar">
                                                        <span class="ql-formats">
                                                            <select class="ql-header">
                                                                <option value="1">Heading</option>
                                                                <option value="2">Subheading</option>
                                                                <option selected>Normal</option>
                                                            </select>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-bold"></button>
                                                            <button class="ql-italic"></button>
                                                            <button class="ql-underline"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-list" value="ordered"></button>
                                                            <button class="ql-list" value="bullet"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-link"></button>
                                                        </span>

                                                        <span class="ql-formats">
                                                            <button class="ql-clean"></button>
                                                        </span>
                                                    </div>
                                                    <div class="form-floating mb-0">
                                                        <input type="hidden" name="im_it"
                                                            value="{{ optional($coPolicyInfo)->im_it }}">
                                                        <div class="aleditor">{!! optional($coPolicyInfo)->im_it !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="portugues" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-portugues">
                                                    <label for="textarea-Desc-pt">Write
                                                        In Português</label>
                                                    <div class="quill-toolbar">
                                                        <span class="ql-formats">
                                                            <select class="ql-header">
                                                                <option value="1">Heading</option>
                                                                <option value="2">Subheading</option>
                                                                <option selected>Normal</option>
                                                            </select>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-bold"></button>
                                                            <button class="ql-italic"></button>
                                                            <button class="ql-underline"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-list" value="ordered"></button>
                                                            <button class="ql-list" value="bullet"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-link"></button>
                                                        </span>

                                                        <span class="ql-formats">
                                                            <button class="ql-clean"></button>
                                                        </span>
                                                    </div>
                                                    <div class="form-floating mb-0">

                                                        <input type="hidden" name="im_pt"
                                                            value="{{ optional($coPolicyInfo)->im_pt }}">
                                                        <div class="aleditor">{!! optional($coPolicyInfo)->im_pt !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="dansk" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-dansk">
                                                    <label for="textarea-Desc-da">Write
                                                        In Dansk</label>
                                                    <div class="quill-toolbar">
                                                        <span class="ql-formats">
                                                            <select class="ql-header">
                                                                <option value="1">Heading</option>
                                                                <option value="2">Subheading</option>
                                                                <option selected>Normal</option>
                                                            </select>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-bold"></button>
                                                            <button class="ql-italic"></button>
                                                            <button class="ql-underline"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-list" value="ordered"></button>
                                                            <button class="ql-list" value="bullet"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-link"></button>
                                                        </span>

                                                        <span class="ql-formats">
                                                            <button class="ql-clean"></button>
                                                        </span>
                                                    </div>
                                                    <div class="form-floating mb-0">
                                                        <input type="hidden" name="im_da"
                                                            value="{{ optional($coPolicyInfo)->im_da }}">
                                                        <div class="aleditor">{!! optional($coPolicyInfo)->im_da !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="nederlands" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-nederlands">
                                                    <label for="textarea-Desc-nl">Write
                                                        In Nederlands</label>
                                                    <div class="quill-toolbar">
                                                        <span class="ql-formats">
                                                            <select class="ql-header">
                                                                <option value="1">Heading</option>
                                                                <option value="2">Subheading</option>
                                                                <option selected>Normal</option>
                                                            </select>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-bold"></button>
                                                            <button class="ql-italic"></button>
                                                            <button class="ql-underline"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-list" value="ordered"></button>
                                                            <button class="ql-list" value="bullet"></button>
                                                        </span>
                                                        <span class="ql-formats">
                                                            <button class="ql-link"></button>
                                                        </span>

                                                        <span class="ql-formats">
                                                            <button class="ql-clean"></button>
                                                        </span>
                                                    </div>
                                                    <div class="form-floating mb-0">
                                                        <input type="hidden" name="im_nl"
                                                            value="{{ optional($coPolicyInfo)->im_nl }}">
                                                        <div class="aleditor">{!! optional($coPolicyInfo)->im_nl !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <button type="submit" id="im-success"
                                                class="btn btn-primary waves-effect waves-float waves-light long_widht_button"
                                                onclick="_run(this)" data-el="fg" data-form="form-im-success"
                                                data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
                                                data-callback="ImSuccessCallBack" data-btnid="im-success">Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Vertical Right Tabs ends -->

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
        function DpSuccessCallBack(data) {
            $('#dp-success').prop('disabled', false);
            if (data.status == true) {
                notify('success', data.message, 'Data Protection Content');
            } else {
                if (data.message != null) {
                    notify('error', data.message, 'Data Protection Content');
                    $.validator("form-dp-success", data.errors);

                } else {
                    notify('error', 'Something Went Wrong!', 'Data Protection Content');
                    $.validator("form-dp-success", data.errors);
                }
            }
        }

        function ImSuccessCallBack(data) {
            $('#im-success').prop('disabled', false);
            if (data.status == true) {
                notify('success', data.message, 'Imprint Content');
            } else {
                if (data.message != null) {
                    notify('error', data.message, 'Imprint Content');
                    $.validator("form-im-success", data.errors);

                } else {
                    notify('error', 'Something Went Wrong!', 'Imprint Content');
                    $.validator("form-im-success", data.errors);
                }
            }
        }
    </script>

    <script>
        (function(window, document, $) {
            'use strict';

            var Font = Quill.import('formats/font');
            Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
            Quill.register(Font, true);

            // Bubble Editor

            // var bubbleEditor = new Quill('#bubble-container .editor', {
            //     bounds: '#bubble-container .editor',
            //     modules: {
            //         formula: true,
            //         syntax: true
            //     },
            //     theme: 'bubble'
            // });

            // Snow Editor
            var allsnowEditor = $('#alEditorWrapper .tab-pane');
            console.log(allsnowEditor);

            var inputFieldValues = []; // Array to store HTML content of each Quill editor

            for (let index = 0; index < allsnowEditor.length; index++) {
                (function(index) { // Create a closure for the current index
                    const element = allsnowEditor[index];
                    const elementEditro = element.querySelector('.aleditor');
                    if (elementEditro !== null) {
                        var quill = new Quill(elementEditro, {
                            bounds: elementEditro,
                            modules: {
                                formula: true,
                                syntax: true,
                                toolbar: element.querySelector('.quill-toolbar')
                            },
                            theme: 'snow'
                        });

                        var inputField = $(element).find('input[type="hidden"]')[0];

                        quill.on('text-change', function(delta, oldDelta, source) {
                            // Update inputFieldValues with the editor's current HTML content
                            inputFieldValues[index] = quill.root.innerHTML;
                            inputField.value = inputFieldValues[index];
                            console.log(inputField.value);
                        });
                    }
                })(index); // Pass the current index to the IIFE
            }




            // var snowEditor = new Quill('#alEditorWrapper .tab-pane .editor', {
            //     bounds: '#alEditorWrapper .tab-pane .editor',
            //     modules: {
            //         formula: true,
            //         syntax: true,
            //         toolbar: '#alEditorWrapper .tab-pane .quill-toolbar'
            //     },
            //     theme: 'snow'
            // });

            // Full Editor

            // var fullEditor = new Quill('#full-container .editor', {
            //     bounds: '#full-container .editor',
            //     modules: {
            //         formula: true,
            //         syntax: true,
            //         toolbar: [
            //             [{
            //                     font: []
            //                 },
            //                 {
            //                     size: []
            //                 }
            //             ],
            //             ['bold', 'italic', 'underline', 'strike'],
            //             [{
            //                     color: []
            //                 },
            //                 {
            //                     background: []
            //                 }
            //             ],
            //             [{
            //                     script: 'super'
            //                 },
            //                 {
            //                     script: 'sub'
            //                 }
            //             ],
            //             [{
            //                     header: '1'
            //                 },
            //                 {
            //                     header: '2'
            //                 },
            //                 'blockquote',
            //                 'code-block'
            //             ],
            //             [{
            //                     list: 'ordered'
            //                 },
            //                 {
            //                     list: 'bullet'
            //                 },
            //                 {
            //                     indent: '-1'
            //                 },
            //                 {
            //                     indent: '+1'
            //                 }
            //             ],
            //             [
            //                 'direction',
            //                 {
            //                     align: []
            //                 }
            //             ],
            //             ['link', 'image', 'video', 'formula'],
            //             ['clean']
            //         ]
            //     },
            //     theme: 'snow'
            // });

            // var editors = [bubbleEditor, snowEditor, fullEditor];
        })(window, document, jQuery);
    </script>
@stop
