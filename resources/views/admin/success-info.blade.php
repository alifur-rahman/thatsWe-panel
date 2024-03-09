@extends('layouts.admin-layout')
@section('title', 'Content | Success Info')

@section('vendor-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/editors/quill/katex.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/extensions/dragula.min.css') }}">

@stop
<!-- BEGIN: Page CSS-->
@section('page-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/forms/form-quill-editor.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css/pages/app-todo.css') }}">
@stop
@section('custom-css')
    <style>
        .al_single_input_item {
            border-bottom: 1px solid #dee2e6 !important;
        }

        .al_assign_name {
            color: #d0d2d6;
        }

        #todo-task-list ul {
            list-style: none;
            padding: 0;
        }
    </style>
@stop
<!-- END: Page CSS-->
<!-- BEGIN: Content-->
@section('content')
    <div class="app-content content todo-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        {{-- <h2 class="content-header-title float-start mb-2">Information About Success</h2> --}}
        <div class="content-area-wrapper container-xxl p-0">


            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-content todo-sidebar">
                        <div class="todo-app-menu">
                            <div class="add-task">
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#add-new-task-modal">
                                    Add New
                                </button>
                            </div>
                            <div class="sidebar-menu-list">
                                <div class="list-group list-group-filters">
                                    <a href="#" class="list-group-item list-group-item-action active">
                                        <i data-feather="mail" class="font-medium-3 me-50"></i>
                                        <span class="align-middle">All</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i data-feather="star" class="font-medium-3 me-50"></i> <span
                                            class="align-middle">Draft</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i data-feather="check" class="font-medium-3 me-50"></i> <span
                                            class="align-middle">Active</span>
                                    </a>

                                </div>
                                <div class="mt-3 px-2 d-flex justify-content-between">
                                    <h6 class="section-label mb-1">Assigned By</h6>
                                    {{-- <i data-feather="plus" class="cursor-pointer"></i> --}}
                                </div>
                                <div class="list-group list-group-labels">
                                    <a href="#"
                                        class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-primary me-1"></span>ThatsWE
                                    </a>
                                    <a href="#"
                                        class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-success me-1"></span>ThatsSoft
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="body-content-overlay"></div>
                        <div class="todo-app-list">
                            <!-- Todo search starts -->
                            <div class="app-fixed-search d-flex align-items-center">
                                <div class="sidebar-toggle d-block d-lg-none ms-1">
                                    <i data-feather="menu" class="font-medium-5"></i>
                                </div>
                                <div class="d-flex align-content-center justify-content-between w-100">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="search"
                                                class="text-muted"></i></span>
                                        <input type="text" class="form-control" id="todo-search"
                                            placeholder="Search task" aria-label="Search..."
                                            aria-describedby="todo-search" />
                                    </div>
                                </div>

                            </div>
                            <!-- Todo search ends -->

                            <!-- Todo List starts -->
                            <div class="todo-task-list-wrapper list-group">
                                <ul class="todo-task-list media-list" id="todo-task-list">

                                    <ul>
                                        @if ($successInfo->isEmpty())
                                            <div class="no-results">
                                                <h5>No Items Found</h5>
                                            </div>
                                        @else
                                            @foreach ($successInfo as $info)
                                                <li class="todo-item completed">
                                                    <div class="todo-title-wrapper">
                                                        <div class="todo-title-area">
                                                            <span>{{ $loop->iteration }}</span>
                                                            {{-- <i data-feather="more-vertical" class=""></i> --}}
                                                            <div class="title-wrapper">
                                                                <span class="todo-title">{{ $info->title_en }}</span>
                                                                <!-- Assuming 'title_en' is the English title -->
                                                            </div>
                                                        </div>
                                                        <div class="todo-item-action">
                                                            <div class="badge-wrapper me-1">
                                                                @if ($info->save_as == 'draft')
                                                                    <span
                                                                        class="badge rounded-pill badge-light-warning">{{ $info->save_as }}</span>
                                                                @else
                                                                    <span
                                                                        class="badge rounded-pill badge-light-success">{{ $info->save_as }}</span>
                                                                @endif


                                                                <!-- Assuming 'save_as' holds the status -->
                                                            </div>
                                                            <small
                                                                class="text-nowrap me-1 al_assign_name">{{ $info->assign_to }}</small>
                                                            <!-- Assuming 'assign_to' holds the assignee name -->
                                                            <small
                                                                class="text-nowrap text-muted me-1">{{ $info->created_at->format('M d') }}</small>
                                                            <!-- Assuming 'created_at' holds the creation date -->
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>


                            </div>
                            <!-- Todo List ends -->
                        </div>

                        <!-- Right Sidebar starts -->
                        <div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
                            <div class="modal-dialog sidebar-lg">
                                <div class="modal-content p-0">
                                    <form id="form-modal-tod" class="todo-modal needs-validation" novalidate
                                        onsubmit="return false">
                                        <div class="modal-header align-items-center mb-1">
                                            <h5 class="">Update Success Information</h5>
                                            <div
                                                class="todo-item-action d-flex align-items-center justify-content-between ms-auto">
                                                <span class="todo-item-favorite cursor-pointer me-75"><i
                                                        data-feather="star" class="font-medium-2"></i></span>
                                                <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal"
                                                    stroke-width="3"></i>
                                            </div>
                                        </div>
                                        <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                            <div class="action-tags">

                                                <div class="mb-1 ">
                                                    <div id="" class="al_single_input_item" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Title</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="accordion" id="accordionTitle">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="enTitle">
                                                                            <button class="accordion-button"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#enTitleAcc"
                                                                                aria-expanded="true"
                                                                                aria-controls="enTitleAcc">
                                                                                English
                                                                            </button>
                                                                        </h2>
                                                                        <div id="enTitleAcc"
                                                                            class="accordion-collapse collapse show"
                                                                            aria-labelledby="enTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">

                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-en" rows="2" placeholder="Write In English"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-en">Write
                                                                                        In English</label>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="deTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#deTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="deTitleAcc">
                                                                                Deutsch
                                                                            </button>
                                                                        </h2>
                                                                        <div id="deTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="deTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">

                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-de" rows="2" placeholder="Write In English"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-de">Write
                                                                                        In Deutsch</label>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="frTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#frTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="frTitleAcc">
                                                                                Français
                                                                            </button>
                                                                        </h2>
                                                                        <div id="frTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="frTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-fr" rows="2" placeholder="Write In Français"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-fr">Write
                                                                                        In Français</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="esTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#esTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="esTitleAcc">
                                                                                Español
                                                                            </button>
                                                                        </h2>
                                                                        <div id="esTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="esTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-sp" rows="2" placeholder="Write In Español"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-sp">Write
                                                                                        In Español</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="tuTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#tuTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="tuTitleAcc">
                                                                                Türkçe
                                                                            </button>
                                                                        </h2>
                                                                        <div id="tuTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="etuTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-tu" rows="2" placeholder="Write In Türkçe"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-tu">Write
                                                                                        In Türkçe</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="itaTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#itaTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="itaTitleAcc">
                                                                                Italiano
                                                                            </button>
                                                                        </h2>
                                                                        <div id="itaTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="itaTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-ita" rows="2" placeholder="Write In Italiano"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-ita">Write
                                                                                        In Italiano</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="porTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#porTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="porTitleAcc">
                                                                                Português
                                                                            </button>
                                                                        </h2>
                                                                        <div id="porTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="porTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-por" rows="2" placeholder="Write In Português"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-por">Write
                                                                                        In Português</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="danTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#danTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="danTitleAcc">
                                                                                Dansk
                                                                            </button>
                                                                        </h2>
                                                                        <div id="danTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="danTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-dan" rows="2" placeholder="Write In Dansk"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-dan">Write
                                                                                        In Dansk</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="nedTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#nedTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="nedTitleAcc">
                                                                                Nederlands
                                                                            </button>
                                                                        </h2>
                                                                        <div id="nedTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="nedTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-ned" rows="2"
                                                                                        placeholder="Write In Nederlands" style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-ned">Write
                                                                                        In Nederlands</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="mb-1 ">
                                                    <div id="" class="al_single_input_item" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Description</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="accordion" id="accordionDesc">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="enDesc">
                                                                            <button class="accordion-button"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#enDescAcc"
                                                                                aria-expanded="true"
                                                                                aria-controls="enDescAcc">
                                                                                English
                                                                            </button>
                                                                        </h2>
                                                                        <div id="enDescAcc"
                                                                            class="accordion-collapse collapse show"
                                                                            aria-labelledby="enDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">

                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-en" rows="2" placeholder="Write In English"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-en">Write
                                                                                        In English</label>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="deDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#deDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="deDescAcc">
                                                                                Deutsch
                                                                            </button>
                                                                        </h2>
                                                                        <div id="deDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="deDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">

                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-de" rows="2" placeholder="Write In English"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-de">Write
                                                                                        In Deutsch</label>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="frDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#frDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="frDescAcc">
                                                                                Français
                                                                            </button>
                                                                        </h2>
                                                                        <div id="frDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="frDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-fr" rows="2" placeholder="Write In Français"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-fr">Write
                                                                                        In Français</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="esDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#esDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="esDescAcc">
                                                                                Español
                                                                            </button>
                                                                        </h2>
                                                                        <div id="esDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="esDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-sp" rows="2" placeholder="Write In Español"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-sp">Write
                                                                                        In Español</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="tuDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#tuDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="tuDescAcc">
                                                                                Türkçe
                                                                            </button>
                                                                        </h2>
                                                                        <div id="tuDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="etuDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-tu" rows="2" placeholder="Write In Türkçe"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-tu">Write
                                                                                        In Türkçe</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="itaDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#itaDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="itaDescAcc">
                                                                                Italiano
                                                                            </button>
                                                                        </h2>
                                                                        <div id="itaDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="itaDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-ita" rows="2" placeholder="Write In Italiano"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-ita">Write
                                                                                        In Italiano</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="porDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#porDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="porDescAcc">
                                                                                Português
                                                                            </button>
                                                                        </h2>
                                                                        <div id="porDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="porDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-por" rows="2" placeholder="Write In Português"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-por">Write
                                                                                        In Português</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="danDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#danDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="danDescAcc">
                                                                                Dansk
                                                                            </button>
                                                                        </h2>
                                                                        <div id="danDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="danDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-dan" rows="2" placeholder="Write In Dansk"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-dan">Write
                                                                                        In Dansk</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="nedDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#nedDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="nedDescAcc">
                                                                                Nederlands
                                                                            </button>
                                                                        </h2>
                                                                        <div id="nedDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="nedDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-ned" rows="2" placeholder="Write In Nederlands"
                                                                                        style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-ned">Write
                                                                                        In Nederlands</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="mb-1 position-relative">
                                                    <label for="task-assigned" class="form-label d-block">Assignee
                                                        To</label>
                                                    <select class="select2 form-select task-assigned_select"
                                                        id="task-assigned" name="task-assigned">
                                                        <option data-img="{{ asset('logo3.png') }}" value="thatswe"
                                                            selected>
                                                            ThatsWE
                                                        </option>
                                                        <option
                                                            data-img="https://thatssoft.de/public/assets/img/icons/logo3.png"
                                                            value="ThatsSoft">
                                                            ThatsSoft
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="mb-1">
                                                    <label for="task-tagd" class="form-label d-block">Save as</label>
                                                    <select class="form-select " id="task-tagd" name="task-tag">
                                                        <option value="active">Active</option>
                                                        <option value="draft">Draft</option>
                                                    </select>
                                                </div>


                                            </div>
                                            <div class="my-1">
                                                <button type="submit"
                                                    class="btn btn-primary add-todo-item me-1">Add</button>
                                                <button type="button" class="btn btn-outline-secondary add-todo-item "
                                                    data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="button"
                                                    class="btn btn-primary update-btn update-todo-item me-1">Update</button>
                                                <button type="button" class="btn btn-outline-danger update-btn "
                                                    data-bs-dismiss="modal">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Right Sidebar ends -->

                        <!-- Right Sidebar starts -->
                        <div class="modal modal-slide-in sidebar-todo-modal fade" id="add-new-task-modal">
                            <div class="modal-dialog sidebar-lg">
                                <div class="modal-content p-0">
                                    <form id="form-modal-success" class="todo-modal" onsubmit="return false"
                                        action="{{ route('content.success-info.submit') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header align-items-center mb-1">
                                            <h5 class="">Add New Success Information</h5>
                                            <div
                                                class="todo-item-action d-flex align-items-center justify-content-between ms-auto">
                                                <span class="todo-item-favorite cursor-pointer me-75"><i
                                                        data-feather="star" class="font-medium-2"></i></span>
                                                <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal"
                                                    stroke-width="3"></i>
                                            </div>
                                        </div>
                                        <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                            <div class="action-tags">

                                                <div class="mb-1 ">
                                                    <div id="" class="al_single_input_item" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Title</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="accordion" id="accordionTitle">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="enTitle">
                                                                            <button class="accordion-button"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#enTitleAcc"
                                                                                aria-expanded="true"
                                                                                aria-controls="enTitleAcc">
                                                                                English
                                                                            </button>
                                                                        </h2>
                                                                        <div id="enTitleAcc"
                                                                            class="accordion-collapse collapse show"
                                                                            aria-labelledby="enTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">

                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-en" rows="2" name="title_en"
                                                                                        placeholder="Write In English" style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-en">Write
                                                                                        In English</label>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="deTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#deTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="deTitleAcc">
                                                                                Deutsch
                                                                            </button>
                                                                        </h2>
                                                                        <div id="deTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="deTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">

                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-de" rows="2" placeholder="Write In English"
                                                                                        name="title_de" style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-de">Write
                                                                                        In Deutsch</label>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="frTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#frTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="frTitleAcc">
                                                                                Français
                                                                            </button>
                                                                        </h2>
                                                                        <div id="frTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="frTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-fr" rows="2" placeholder="Write In Français"
                                                                                        name="title_fr" style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-fr">Write
                                                                                        In Français</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="esTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#esTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="esTitleAcc">
                                                                                Español
                                                                            </button>
                                                                        </h2>
                                                                        <div id="esTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="esTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-sp" rows="2" name="title_sp"
                                                                                        placeholder="Write In Español" style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-sp">Write
                                                                                        In Español</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="tuTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#tuTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="tuTitleAcc">
                                                                                Türkçe
                                                                            </button>
                                                                        </h2>
                                                                        <div id="tuTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="etuTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea
                                                                                        class="form-control 
                                                                                 char-textarea"
                                                                                        name="title_tr" id="textarea-title-tu" rows="2" placeholder="Write In Türkçe" style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-tu">Write
                                                                                        In Türkçe</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="itaTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#itaTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="itaTitleAcc">
                                                                                Italiano
                                                                            </button>
                                                                        </h2>
                                                                        <div id="itaTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="itaTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" name="title_it" id="textarea-title-ita" rows="2"
                                                                                        placeholder="Write In Italiano" style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-ita">Write
                                                                                        In Italiano</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="porTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#porTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="porTitleAcc">
                                                                                Português
                                                                            </button>
                                                                        </h2>
                                                                        <div id="porTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="porTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" name="title_po" id="textarea-title-por" rows="2"
                                                                                        placeholder="Write In Português" style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-por">Write
                                                                                        In Português</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="danTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#danTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="danTitleAcc">
                                                                                Dansk
                                                                            </button>
                                                                        </h2>
                                                                        <div id="danTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="danTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" name="title_da" id="textarea-title-dan" rows="2"
                                                                                        placeholder="Write In Dansk" style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-dan">Write
                                                                                        In Dansk</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="nedTitle">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#nedTitleAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="nedTitleAcc">
                                                                                Nederlands
                                                                            </button>
                                                                        </h2>
                                                                        <div id="nedTitleAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="nedTitle"
                                                                            data-bs-parent="#accordionTitle">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-title-ned" rows="2" name="title_ne"
                                                                                        placeholder="Write In Nederlands" style="height: 50px"></textarea>
                                                                                    <label for="textarea-title-ned">Write
                                                                                        In Nederlands</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="mb-1 ">
                                                    <div id="" class="al_single_input_item" role="tablist"
                                                        aria-multiselectable="true">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Description</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="accordion" id="accordionDesc">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="enDesc">
                                                                            <button class="accordion-button"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#enDescAcc"
                                                                                aria-expanded="true"
                                                                                aria-controls="enDescAcc">
                                                                                English
                                                                            </button>
                                                                        </h2>
                                                                        <div id="enDescAcc"
                                                                            class="accordion-collapse collapse show"
                                                                            aria-labelledby="enDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">

                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-en" rows="2" placeholder="Write In English"
                                                                                        name="desc_en" style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-en">Write
                                                                                        In English</label>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="deDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#deDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="deDescAcc">
                                                                                Deutsch
                                                                            </button>
                                                                        </h2>
                                                                        <div id="deDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="deDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">

                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-de" rows="2" placeholder="Write In English"
                                                                                        name="desc_de" style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-de">Write
                                                                                        In Deutsch</label>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="frDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#frDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="frDescAcc">
                                                                                Français
                                                                            </button>
                                                                        </h2>
                                                                        <div id="frDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="frDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-fr" rows="2" name="desc_fr"
                                                                                        placeholder="Write In Français" style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-fr">Write
                                                                                        In Français</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="esDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#esDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="esDescAcc">
                                                                                Español
                                                                            </button>
                                                                        </h2>
                                                                        <div id="esDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="esDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-sp" rows="2" placeholder="Write In Español"
                                                                                        name="desc_sp" style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-sp">Write
                                                                                        In Español</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="tuDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#tuDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="tuDescAcc">
                                                                                Türkçe
                                                                            </button>
                                                                        </h2>
                                                                        <div id="tuDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="etuDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-tu" name="desc_tr" rows="2"
                                                                                        placeholder="Write In Türkçe" style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-tu">Write
                                                                                        In Türkçe</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="itaDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#itaDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="itaDescAcc">
                                                                                Italiano
                                                                            </button>
                                                                        </h2>
                                                                        <div id="itaDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="itaDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-ita" rows="2" name="desc_it"
                                                                                        placeholder="Write In Italiano" style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-ita">Write
                                                                                        In Italiano</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="porDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#porDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="porDescAcc">
                                                                                Português
                                                                            </button>
                                                                        </h2>
                                                                        <div id="porDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="porDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-por" rows="2" name="desc_po"
                                                                                        placeholder="Write In Português" style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-por">Write
                                                                                        In Português</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="danDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#danDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="danDescAcc">
                                                                                Dansk
                                                                            </button>
                                                                        </h2>
                                                                        <div id="danDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="danDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea
                                                                                        class="form-control 
                                                                                    char-textarea"
                                                                                        id="textarea-Desc-dan" rows="2" placeholder="Write In Dansk" name="desc_da" style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-dan">Write
                                                                                        In Dansk</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="nedDesc">
                                                                            <button class="accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#nedDescAcc"
                                                                                aria-expanded="false"
                                                                                aria-controls="nedDescAcc">
                                                                                Nederlands
                                                                            </button>
                                                                        </h2>
                                                                        <div id="nedDescAcc"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="nedDesc"
                                                                            data-bs-parent="#accordionDesc">
                                                                            <div class="accordion-body">
                                                                                <div class="form-floating mb-0">
                                                                                    <textarea class="form-control char-textarea" id="textarea-Desc-ned" rows="2" name="desc_ne"
                                                                                        placeholder="Write In Nederlands" style="height: 50px"></textarea>
                                                                                    <label for="textarea-Desc-ned">Write
                                                                                        In Nederlands</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="mb-1 position-relative">
                                                    <label for="task-assigned_e" class="form-label d-block">Assignee
                                                        To</label>
                                                    <select class="select2 form-select task-assigned_select"
                                                        id="task-assigned_e" name="assign_to">
                                                        <option data-img="{{ asset('logo3.png') }}" value="ThatsWE"
                                                            selected>
                                                            ThatsWE
                                                        </option>
                                                        <option
                                                            data-img="https://thatssoft.de/public/assets/img/icons/logo3.png"
                                                            value="ThatsSoft">
                                                            ThatsSoft
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="mb-1">
                                                    <label for="task-tagr" class="form-label d-block">Save as</label>
                                                    <select class="form-select " id="task-tagr" name="save_as">
                                                        <option value="draft">Draft</option>
                                                        <option value="active">Active</option>

                                                    </select>
                                                </div>


                                            </div>
                                            <div class="my-1">
                                                <button type="submit" id="add-success"
                                                    class="btn btn-primary add-todo-item me-1" onclick="_run(this)"
                                                    data-el="fg" data-form="form-modal-success"
                                                    data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
                                                    data-callback="addSuccessCallBack"
                                                    data-btnid="add-success">Add</button>
                                                <button type="button"
                                                    class="btn btn-outline-secondary add-todo-item cancel_modal"
                                                    data-bs-dismiss="modal">
                                                    Cancel
                                                </button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Right Sidebar ends -->

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
<!-- END: Content-->

@section('page-vendor-js')
    <script src="{{ asset('admin-assets/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    {{-- <script src="{{ asset('admin-assets/app-assets/vendors/js/editors/quill/quill.min.js') }}"></script> --}}
    <script src="{{ asset('admin-assets/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/extensions/dragula.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
@stop

@section('page-js')
    <script src="{{ asset('admin-assets/app-assets/js/scripts/pages/app-todo.js') }}"></script>
    <script>
        var newTaskModal = $('#new-task-modal'),
            addTaskModal = $('#add-new-task-modal'),
            overlay = $('.body-content-overlay'),
            modalbackdrop = $('.modal-backdrop'),
            sidebarLeft = $('.sidebar-left'),
            cencelModal = $('.cancel_modal');

        $(document).on('click', '.todo-task-list-wrapper .todo-item', function(e) {
            newTaskModal.modal('show');
            toastr['success']('Task Completed', 'Congratulations!! 🎉', {
                closeButton: true,
                tapToDismiss: false,

            });
        });


        function addSuccessCallBack(data) {
            $('#add-success').prop('disabled', false);
            if (data.status == true) {
                notify('success', data.message, 'Add Success Info');
                cencelModal.trigger('click');

            } else {
                if (data.message != null) {
                    notify('error', data.message, 'Add Success Info');
                    $.validator("form-modal-success", data.errors);
                } else {
                    notify('error', 'Something Went Wrong!', 'Add Success Info');
                    $.validator("form-modal-success", data.errors);
                }
            }
        }
    </script>

@endsection
