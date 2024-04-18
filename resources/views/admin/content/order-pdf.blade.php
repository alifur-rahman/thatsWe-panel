@extends('layouts.admin-layout')
@section('title', 'Content Orders PDF')
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

                        <div class="col-xl-8 col-lg-8 col-md-12">
                            {{-- header content  --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">PDF Headers Contents</h4>
                                </div>
                                <form action="{{ route('content.pdf.order.submit') }}" method="post"
                                    id="form-header-success" onsubmit="return false">
                                    @csrf
                                    <input type="hidden" name="type" value="header">
                                    <div class="card-body">
                                        <div class="nav-vertical">
                                            <ul class="nav nav-tabs nav-left flex-column" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="hbaseVerticalLeft-english"
                                                        data-bs-toggle="tab" aria-controls="henglish" href="#henglish"
                                                        role="tab" aria-selected="true">English</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="hbaseVerticalLeft-deutsch" data-bs-toggle="tab"
                                                        aria-controls="hdeutsch" href="#hdeutsch" role="tab"
                                                        aria-selected="false">Deutsch</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="hbaseVerticalLeft-francais" data-bs-toggle="tab"
                                                        aria-controls="hfrancais" href="#hfrancais" role="tab"
                                                        aria-selected="false">Français
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="hbaseVerticalLeft-espanol" data-bs-toggle="tab"
                                                        aria-controls="hespanol" href="#hespanol" role="tab"
                                                        aria-selected="false">Español
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="hbaseVerticalLeft-turkce"
                                                        data-bs-toggle="tab" aria-controls="hturkce" href="#hturkce"
                                                        role="tab" aria-selected="false">Türkçe
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="hbaseVerticalLeft-italiano"
                                                        data-bs-toggle="tab" aria-controls="hitaliano" href="#hitaliano"
                                                        role="tab" aria-selected="false">Italiano
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="hbaseVerticalLeft-portugues"
                                                        data-bs-toggle="tab" aria-controls="hportugues"
                                                        href="#hportugues" role="tab" aria-selected="false">Português
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="hbaseVerticalLeft-dansk" data-bs-toggle="tab"
                                                        aria-controls="hdansk" href="#hdansk" role="tab"
                                                        aria-selected="false">Dansk
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="hbaseVerticalLeft-nederlands"
                                                        data-bs-toggle="tab" aria-controls="hnederlands"
                                                        href="#hnederlands" role="tab"
                                                        aria-selected="false">Nederlands
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="henglish" role="tabpanel"
                                                    aria-labelledby="hbaseVerticalLeft-english">
                                                    <br>
                                                    <div class="mb-1">
                                                        <label for="title-en">Title In English</label>
                                                        <input type="text" class="form-control-lg form-control"
                                                            name="title_en" id="title-en"
                                                            value="{{ optional($coPdfInfo)->title_en }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="subt-en">Subtitle In English</label>
                                                        <input type="text" class="form-control-sm form-control"
                                                            name="subt_en" id="subt-en"
                                                            value="{{ optional($coPdfInfo)->subt_en }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="ld-en">Licence Duration In English</label>
                                                        <input type="text" class=" form-control" name="ld_en"
                                                            id="ld-en" value="{{ optional($coPdfInfo)->ld_en }}">
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="hdeutsch" role="tabpanel"
                                                    aria-labelledby="hbaseVerticalLeft-deutsch">
                                                    <br>
                                                    <div class="mb-1">
                                                        <label for="title-de">Title In Deutsch</label>
                                                        <input type="text" class="form-control-lg form-control"
                                                            name="title_de" id="title-de"
                                                            value="{{ optional($coPdfInfo)->title_de }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="subt-de">Subtitle In Deutsch</label>
                                                        <input type="text" class="form-control-sm form-control"
                                                            name="subt_de" id="subt-de"
                                                            value="{{ optional($coPdfInfo)->subt_de }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="ld-de">Licence Duration In Deutsch</label>
                                                        <input type="text" class=" form-control" name="ld_de"
                                                            id="ld-de" value="{{ optional($coPdfInfo)->ld_de }}">
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="hfrancais" role="tabpanel"
                                                    aria-labelledby="hbaseVerticalLeft-francais">
                                                    <br>
                                                    <div class="mb-1">
                                                        <label for="title-fr">Title In Français</label>
                                                        <input type="text" class="form-control-lg form-control"
                                                            name="title_fr" id="title-fr"
                                                            value="{{ optional($coPdfInfo)->title_fr }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="subt-fr">Subtitle In Français</label>
                                                        <input type="text" class="form-control-sm form-control"
                                                            name="subt_fr" id="subt-fr"
                                                            value="{{ optional($coPdfInfo)->subt_fr }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="ld-fr">Licence Duration In Français</label>
                                                        <input type="text" class=" form-control" name="ld_fr"
                                                            id="ld-fr" value="{{ optional($coPdfInfo)->ld_fr }}">
                                                    </div>


                                                </div>
                                                <div class="tab-pane" id="hespanol" role="tabpanel"
                                                    aria-labelledby="hbaseVerticalLeft-espanol">
                                                    <br>
                                                    <div class="mb-1">
                                                        <label for="title-es">Title In Español</label>
                                                        <input type="text" class="form-control-lg form-control"
                                                            name="title_es" id="title-es"
                                                            value="{{ optional($coPdfInfo)->title_es }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="subt-es">Subtitle In Español</label>
                                                        <input type="text" class="form-control-sm form-control"
                                                            name="subt_es" id="subt-es"
                                                            value="{{ optional($coPdfInfo)->subt_es }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="ld-es">Licence Duration In Español</label>
                                                        <input type="text" class=" form-control" name="ld_es"
                                                            id="ld-es" value="{{ optional($coPdfInfo)->ld_es }}">
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="hturkce" role="tabpanel"
                                                    aria-labelledby="hbaseVerticalLeft-turkce">
                                                    <br>
                                                    <div class="mb-1">
                                                        <label for="title-tr">Title In Türkçe</label>
                                                        <input type="text" class="form-control-lg form-control"
                                                            name="title_tr" id="title-tr"
                                                            value="{{ optional($coPdfInfo)->title_tr }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="subt-tr">Subtitle In Türkçe</label>
                                                        <input type="text" class="form-control-sm form-control"
                                                            name="subt_tr" id="subt-tr"
                                                            value="{{ optional($coPdfInfo)->subt_tr }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="ld-tr">Licence Duration In Türkçe</label>
                                                        <input type="text" class=" form-control" name="ld_tr"
                                                            id="ld-tr" value="{{ optional($coPdfInfo)->ld_tr }}">
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="hitaliano" role="tabpanel"
                                                    aria-labelledby="hbaseVerticalLeft-italiano">
                                                    <br>


                                                    <div class="mb-1">
                                                        <label for="title-it">Title In Italiano</label>
                                                        <input type="text" class="form-control-lg form-control"
                                                            name="title_it" id="title-it"
                                                            value="{{ optional($coPdfInfo)->title_it }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="subt-it">Subtitle In Italiano</label>
                                                        <input type="text" class="form-control-sm form-control"
                                                            name="subt_it" id="subt-it"
                                                            value="{{ optional($coPdfInfo)->subt_it }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="ld-it">Licence Duration In Italiano</label>
                                                        <input type="text" class=" form-control" name="ld_it"
                                                            id="ld-it" value="{{ optional($coPdfInfo)->ld_it }}">
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="hportugues" role="tabpanel"
                                                    aria-labelledby="hbaseVerticalLeft-portugues">
                                                    <br>

                                                    <div class="mb-1">
                                                        <label for="title-pt">Title In Português</label>
                                                        <input type="text" class="form-control-lg form-control"
                                                            name="title_pt" id="title-pt"
                                                            value="{{ optional($coPdfInfo)->title_pt }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="subt-pt">Subtitle In Português</label>
                                                        <input type="text" class="form-control-sm form-control"
                                                            name="subt_pt" id="subt-pt"
                                                            value="{{ optional($coPdfInfo)->subt_pt }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="ld-pt">Licence Duration In Português</label>
                                                        <input type="text" class=" form-control" name="ld_pt"
                                                            id="ld-pt" value="{{ optional($coPdfInfo)->ld_pt }}">
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="hdansk" role="tabpanel"
                                                    aria-labelledby="hbaseVerticalLeft-dansk">
                                                    <br>

                                                    <div class="mb-1">
                                                        <label for="title-da">Title In Dansk</label>
                                                        <input type="text" class="form-control-lg form-control"
                                                            name="title_da" id="title-da"
                                                            value="{{ optional($coPdfInfo)->title_da }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="subt-da">Subtitle In Dansk</label>
                                                        <input type="text" class="form-control-sm form-control"
                                                            name="subt_da" id="subt-da"
                                                            value="{{ optional($coPdfInfo)->subt_da }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="ld-da">Licence Duration In Dansk</label>
                                                        <input type="text" class=" form-control" name="ld_da"
                                                            id="ld-da" value="{{ optional($coPdfInfo)->ld_da }}">
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="hnederlands" role="tabpanel"
                                                    aria-labelledby="hbaseVerticalLeft-nederlands">
                                                    <br>

                                                    <div class="mb-1">
                                                        <label for="title-nl">Title In Nederlands</label>
                                                        <input type="text" class="form-control-lg form-control"
                                                            name="title_nl" id="title-nl"
                                                            value="{{ optional($coPdfInfo)->title_nl }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="subt-nl">Subtitle In Nederlands</label>
                                                        <input type="text" class="form-control-sm form-control"
                                                            name="subt_nl" id="subt-nl"
                                                            value="{{ optional($coPdfInfo)->subt_nl }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="ld-nl">Licence Duration In Nederlands</label>
                                                        <input type="text" class=" form-control" name="ld_nl"
                                                            id="ld-nl" value="{{ optional($coPdfInfo)->ld_nl }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-end align-items-center">
                                            <button type="submit" id="add-header-success"
                                                class="btn btn-primary waves-effect waves-float waves-light long_widht_button"
                                                onclick="_run(this)" data-el="fg" data-form="form-header-success"
                                                data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
                                                data-callback="headerSuccessCallBack" data-btnid="add-success">Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- main pdf content  --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">PDF Main Contents</h4>
                                </div>
                                <form action="{{ route('content.pdf.order.submit') }}" method="post"
                                    id="form-main-success" onsubmit="return false">
                                    @csrf
                                    <input type="hidden" name="type" value="main_content">
                                    <div class="card-body">
                                        <div class="nav-vertical">
                                            <ul class="nav nav-tabs nav-left flex-column" role="tablist">
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
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="english" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-english">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-en" rows="5" placeholder="Write In English"
                                                            name="txt_en">{{ optional($coPdfInfo)->txt_en }}</textarea>
                                                        <label for="textarea-Desc-en">Write
                                                            In English</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="deutsch" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-deutsch">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-de" rows="5" placeholder="Write In Deutsch"
                                                            name="txt_de">{{ optional($coPdfInfo)->txt_de }}</textarea>
                                                        <label for="textarea-Desc-de">Write
                                                            In Deutsch</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="francais" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-francais">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-fr" rows="5" placeholder="Write In Français"
                                                            name="txt_fr">{{ optional($coPdfInfo)->txt_fr }}</textarea>
                                                        <label for="textarea-Desc-fr">Write
                                                            In Français</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="espanol" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-espanol">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-es" rows="5" placeholder="Write In Español"
                                                            name="txt_es">{{ optional($coPdfInfo)->txt_es }}</textarea>
                                                        <label for="textarea-Desc-fr">Write
                                                            In Español</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="turkce" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-turkce">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-tr" rows="5" placeholder="Write In Türkçe"
                                                            name="txt_tr">{{ optional($coPdfInfo)->txt_tr }}</textarea>
                                                        <label for="textarea-Desc-fr">Write
                                                            In Türkçe</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="italiano" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-italiano">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-it" rows="5" placeholder="Write In Italiano"
                                                            name="txt_it">{{ optional($coPdfInfo)->txt_it }}</textarea>
                                                        <label for="textarea-Desc-it">Write
                                                            In Italiano</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="portugues" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-portugues">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-pt" rows="5" placeholder="Write In Português"
                                                            name="txt_pt">{{ optional($coPdfInfo)->txt_pt }}</textarea>
                                                        <label for="textarea-Desc-pt">Write
                                                            In Português</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="dansk" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-dansk">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-da" rows="5" placeholder="Write In Dansk"
                                                            name="txt_da">{{ optional($coPdfInfo)->txt_da }}</textarea>
                                                        <label for="textarea-Desc-da">Write
                                                            In Dansk</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="nederlands" role="tabpanel"
                                                    aria-labelledby="baseVerticalLeft-nederlands">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="textarea-Desc-nl" rows="5" placeholder="Write In Nederlands"
                                                            name="txt_nl">{{ optional($coPdfInfo)->txt_nl }}</textarea>
                                                        <label for="textarea-Desc-nl">Write
                                                            In Nederlands</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-end align-items-center">
                                            <button type="submit" id="add-main-success"
                                                class="btn btn-primary waves-effect waves-float waves-light long_widht_button"
                                                onclick="_run(this)" data-el="fg" data-form="form-main-success"
                                                data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
                                                data-callback="mainSuccessCallBack" data-btnid="add-success">Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- footer contents  --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">PDF Footer Content </h4>
                                </div>
                                <form action="{{ route('content.pdf.order.submit') }}" method="post"
                                    id="form-footer-success" onsubmit="return false">
                                    @csrf
                                    <input type="hidden" name="type" value="footer">
                                    <div class="card-body">
                                        <div class="nav-vertical">
                                            <ul class="nav nav-tabs nav-left flex-column" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="fbaseVerticalLeft-english"
                                                        data-bs-toggle="tab" aria-controls="fenglish" href="#fenglish"
                                                        role="tab" aria-selected="true">English</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="fbaseVerticalLeft-deutsch"
                                                        data-bs-toggle="tab" aria-controls="fdeutsch" href="#fdeutsch"
                                                        role="tab" aria-selected="false">Deutsch</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="fbaseVerticalLeft-francais"
                                                        data-bs-toggle="tab" aria-controls="ffrancais" href="#ffrancais"
                                                        role="tab" aria-selected="false">Français
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="fbaseVerticalLeft-espanol"
                                                        data-bs-toggle="tab" aria-controls="fespanol" href="#fespanol"
                                                        role="tab" aria-selected="false">Español
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="fbaseVerticalLeft-turkce"
                                                        data-bs-toggle="tab" aria-controls="fturkce" href="#fturkce"
                                                        role="tab" aria-selected="false">Türkçe
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="fbaseVerticalLeft-italiano"
                                                        data-bs-toggle="tab" aria-controls="fitaliano" href="#fitaliano"
                                                        role="tab" aria-selected="false">Italiano
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="fbaseVerticalLeft-portugues"
                                                        data-bs-toggle="tab" aria-controls="fportugues"
                                                        href="#fportugues" role="tab" aria-selected="false">Português
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="fbaseVerticalLeft-dansk" data-bs-toggle="tab"
                                                        aria-controls="fdansk" href="#fdansk" role="tab"
                                                        aria-selected="false">Dansk
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="fbaseVerticalLeft-nederlands"
                                                        data-bs-toggle="tab" aria-controls="fnederlands"
                                                        href="#fnederlands" role="tab"
                                                        aria-selected="false">Nederlands
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="fenglish" role="tabpanel"
                                                    aria-labelledby="fbaseVerticalLeft-english">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="ftextarea-Desc-en" rows="5" placeholder="Write In English"
                                                            name="ftxt_en">{{ optional($coPdfInfo)->ftxt_en }}</textarea>
                                                        <label for="ftextarea-Desc-en">Write
                                                            In English</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="fdeutsch" role="tabpanel"
                                                    aria-labelledby="fbaseVerticalLeft-deutsch">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="ftextarea-Desc-de" rows="5" placeholder="Write In Deutsch"
                                                            name="ftxt_de">{{ optional($coPdfInfo)->ftxt_de }}</textarea>
                                                        <label for="ftextarea-Desc-de">Write
                                                            In Deutsch</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="ffrancais" role="tabpanel"
                                                    aria-labelledby="fbaseVerticalLeft-francais">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="ftextarea-Desc-fr" rows="5" placeholder="Write In Français"
                                                            name="ftxt_fr">{{ optional($coPdfInfo)->ftxt_fr }}</textarea>
                                                        <label for="ftextarea-Desc-fr">Write
                                                            In Français</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="fespanol" role="tabpanel"
                                                    aria-labelledby="fbaseVerticalLeft-espanol">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="ftextarea-Desc-es" rows="5" placeholder="Write In Español"
                                                            name="ftxt_es">{{ optional($coPdfInfo)->ftxt_es }}</textarea>
                                                        <label for="ftextarea-Desc-fr">Write
                                                            In Español</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="fturkce" role="tabpanel"
                                                    aria-labelledby="fbaseVerticalLeft-turkce">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="ftextarea-Desc-tr" rows="5" placeholder="Write In Türkçe"
                                                            name="ftxt_tr">{{ optional($coPdfInfo)->ftxt_tr }}</textarea>
                                                        <label for="ftextarea-Desc-fr">Write
                                                            In Türkçe</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="fitaliano" role="tabpanel"
                                                    aria-labelledby="fbaseVerticalLeft-italiano">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="ftextarea-Desc-it" rows="5" placeholder="Write In Italiano"
                                                            name="ftxt_it">{{ optional($coPdfInfo)->ftxt_it }}</textarea>
                                                        <label for="ftextarea-Desc-it">Write
                                                            In Italiano</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="fportugues" role="tabpanel"
                                                    aria-labelledby="fbaseVerticalLeft-portugues">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="ftextarea-Desc-pt" rows="5" placeholder="Write In Português"
                                                            name="ftxt_pt">{{ optional($coPdfInfo)->ftxt_pt }}</textarea>
                                                        <label for="ftextarea-Desc-pt">Write
                                                            In Português</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="fdansk" role="tabpanel"
                                                    aria-labelledby="fbaseVerticalLeft-dansk">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="ftextarea-Desc-da" rows="5" placeholder="Write In Dansk"
                                                            name="ftxt_da">{{ optional($coPdfInfo)->ftxt_da }}</textarea>
                                                        <label for="ftextarea-Desc-da">Write
                                                            In Dansk</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="fnederlands" role="tabpanel"
                                                    aria-labelledby="fbaseVerticalLeft-nederlands">
                                                    <br>
                                                    <div class="form-floating mb-0">
                                                        <textarea class="form-control char-textarea" id="ftextarea-Desc-nl" rows="5" placeholder="Write In Nederlands"
                                                            name="ftxt_nl">{{ optional($coPdfInfo)->ftxt_nl }}</textarea>
                                                        <label for="ftextarea-Desc-nl">Write
                                                            In Nederlands</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-end align-items-center">
                                            <button type="submit" id="add-footer-success"
                                                class="btn btn-primary waves-effect waves-float waves-light long_widht_button"
                                                onclick="_run(this)" data-el="fg" data-form="form-footer-success"
                                                data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
                                                data-callback="footerSuccessCallBack" data-btnid="add-success">Submit
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
                                    <p class="card-text">This section manages the content of the order PDF. You can see the
                                        demo view of the PDF in here: <a href="https://thatswe.de/pdf"
                                            target="_blank">www.thatswe.de/pdf</a>. If
                                        you need to change the content of the order PDF in every language, simply make
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
                                                <p class="card-text mb-1"> 5. Go <a href="https://thatswe.de/pdf"
                                                        target="_blank">www.thatswe.de/pdf</a> and reload to see the
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
        function headerSuccessCallBack(data) {
            $('#add-header-success').prop('disabled', false);
            if (data.status == true) {
                notify('success', data.message, 'Add PDF Content');
            } else {
                if (data.message != null) {
                    notify('error', data.message, 'Add PDF Content');
                    $.validator("form-header-success", data.errors);

                } else {
                    notify('error', 'Something Went Wrong!', 'Add PDF Content');
                    $.validator("form-header-success", data.errors);
                }
            }
        }

        function mainSuccessCallBack(data) {
            $('#add-main-success').prop('disabled', false);
            if (data.status == true) {
                notify('success', data.message, 'Add PDF Content');
            } else {
                if (data.message != null) {
                    notify('error', data.message, 'Add PDF Content');
                    $.validator("form-main-success", data.errors);

                } else {
                    notify('error', 'Something Went Wrong!', 'Add PDF Content');
                    $.validator("form-main-success", data.errors);
                }
            }
        }

        function footerSuccessCallBack(data) {
            $('#add-footer-success').prop('disabled', false);
            if (data.status == true) {
                notify('success', data.message, 'Add PDF Content');
            } else {
                if (data.message != null) {
                    notify('error', data.message, 'Add PDF Content');
                    $.validator("form-footer-success", data.errors);

                } else {
                    notify('error', 'Something Went Wrong!', 'Add PDF Content');
                    $.validator("form-footer-success", data.errors);
                }
            }
        }
    </script>

@stop
<!-- BEGIN: page JS -->
