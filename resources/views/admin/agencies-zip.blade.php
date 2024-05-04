@extends('layouts.admin-layout')
@section('title', 'Agency By Zip ')
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
        /* for Laptop */
        @media screen and (max-width: 1280px) and (min-width: 800px) {

            .ib-withdraw thead tr th:nth-child(6),
            .ib-withdraw tbody tr td:nth-child(6) {
                display: none;
            }

            .small-none {
                display: none;
            }
        }


        @media screen and (max-width: 1440px) and (min-width: 900px) {

            .ib-withdraw thead tr th:nth-child(6),
            .ib-withdraw tbody tr td:nth-child(6) {
                display: none;
            }

            .small-none {
                display: none;
            }
        }

        td,
        th {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .col-lg-6.d-grid {
            padding-top: 4px;
        }


        table.dataTable.table-responsive {
            display: block;
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
                <!-- Ajax Sourced Server-side -->
                <section id="ajax-datatable">
                    <div class="row">
                        <div class=" col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Guidelines</h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">This section manages the content of the "Travel agencies with
                                        thatsWE by zip code": <a href="https://thatssoft.de/policy"
                                            target="_blank">www.thatssoft.de/policy</a>. If
                                        you need to Add new, Edit and Delete the content of "Travel agencies with
                                        thatsWE by zip code" please follow the below steps.</p>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="demo-spacing-0">
                                                <div class="alert alert-info" role="alert">
                                                    <h4 class="alert-heading"> For Add New Item:</h4>
                                                    <div class="alert-body">
                                                        <p class="card-text mb-1"> 1. Click on "Add New Agency" button</p>
                                                        <p class="card-text mb-1"> 2. Fill Up the 'Add New Agency Details'
                                                            form
                                                        </p>
                                                        <p class="card-text  mb-1"> 3. Click on "Save Agency Details"
                                                            button. </p>
                                                        <p class="card-text mb-1"> 4. You will get a success message.</p>
                                                        <p class="card-text mb-1"> 5. Go <a
                                                                href="https://thatssoft.de/policy"
                                                                target="_blank">www.thatssoft.de/policy</a> and reload to
                                                            see
                                                            the
                                                            Changes</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="demo-spacing-0">
                                                <div class="alert alert-info" role="alert">
                                                    <h4 class="alert-heading"> For Edit/Update Item:</h4>
                                                    <div class="alert-body">
                                                        <p class="card-text mb-1"> 1. Scroll down to see the all the Agency
                                                            list table.</p>
                                                        <p class="card-text mb-1"> 2. Under the 'Action' column of the list
                                                            table. click on <i data-feather="edit" class="text-primary"></i>
                                                            edit icon of your seleted item
                                                        </p>
                                                        <p class="card-text  mb-1"> 3. Update/edit the 'Update Agency
                                                            Details'
                                                            form </p>
                                                        <p class="card-text  mb-1"> 4. Click on "Update Agency Details"
                                                            button. </p>
                                                        <p class="card-text mb-1"> 5. You will get a success message.</p>
                                                        <p class="card-text mb-1"> 6. Go <a
                                                                href="https://thatssoft.de/policy"
                                                                target="_blank">www.thatssoft.de/policy</a> and reload to
                                                            see
                                                            the
                                                            Changes</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="demo-spacing-0">
                                                <div class="alert alert-info" role="alert">
                                                    <h4 class="alert-heading"> For Delete Item:</h4>
                                                    <div class="alert-body">
                                                        <p class="card-text mb-1"> 1. Scroll down to see the all the Agency
                                                            list table.</p>
                                                        <p class="card-text mb-1"> 2. Under the 'Action' column of the list
                                                            table. click on <i data-feather="trash"
                                                                class="text-danger"></i> trash icon of your seleted item
                                                        </p>
                                                        <p class="card-text  mb-1"> 3. It will open a confirmation box.
                                                        </p>
                                                        <p class="card-text  mb-1"> 4. Click on "Yes, Delete it!"
                                                            button. </p>
                                                        <p class="card-text mb-1"> 5. You will get a success message.</p>
                                                        <p class="card-text mb-1"> 6. Go <a
                                                                href="https://thatswe.de/policy"
                                                                target="_blank">www.thatswe.de/policy</a> and reload to see
                                                            the
                                                            Changes</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card border-start-primary border-5">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-end justify-content-start h-100">
                                            <img src="{{ asset('admin-assets/app-assets/images/illustration/faq-illustrations.svg') }}"
                                                class="img-fluid " alt="Image" width="85">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card-body text-sm-end text-center ps-sm-0">
                                            <a href="javascript:void(0)" class=" text-nowrap add-new-role"
                                                data-bs-toggle="modal" data-bs-target="#add-item-modal">
                                                <span class="btn btn-primary mb-1 waves-effect waves-float waves-light">Add
                                                    New
                                                    Agency</span>
                                            </a>
                                            <p class="mb-0">Add New Agency details </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-12">
                            <div class="card">
                                <div class="card-datatable">
                                    <table class="datatables-ajax ib-withdraw table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>{{ __('ZIP') }}</th>
                                                <th>{{ __('Company Name') }}</th>
                                                <th>{{ __('City') }}</th>
                                                <th>{{ __('Street') }}</th>
                                                <th>{{ __('telephone') }}</th>
                                                <th>{{ __('WWW') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Ajax Sourced Server-side -->
            </div>
        </div>
    </div>


    <!-- END: Content-->
    <!-- Add new Model Modal -->
    <div class="modal fade text-start" id="add-item-modal" tabindex="-1" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Add New Agency Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-add-new" onsubmit="return false" action="{{ route('agency.zip.submit') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body form-block p-5">
                        <div id="admin-update-form-field">
                            <div class="mb-1 row">
                                <label for="zip" class="col-sm-3 col-form-label">ZIP Code<span
                                        class="text-danger">☆</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="zip" class="form-control" id="zip"
                                        placeholder="6001">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="company" class="col-sm-3 col-form-label">Company Name<span
                                        class="text-danger">☆</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="company_name" class="form-control" id="company"
                                        placeholder="ThatsWe">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="city" class="col-sm-3 col-form-label">City<span
                                        class="text-danger">☆</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="city" class="form-control" id="city"
                                        placeholder="Frankforth">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="street" class="col-sm-3 col-form-label">Street<span
                                        class="text-danger">☆</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="street" class="form-control" id="street"
                                        placeholder="Masterstreet 6">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="site_url" class="col-sm-3 col-form-label">WWW<span
                                        class="text-danger">☆</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="site_url" class="form-control" id="site_url"
                                        placeholder="thatswe.de">
                                </div>
                            </div>

                            <div class="mb-1 row">
                                <label for="telephone" class="col-sm-3 col-form-label">Telephone<span
                                        class="text-danger">☆</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="telephone" class="form-control" id="telephone"
                                        placeholder="0049 425 78547">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="email" class="col-sm-3 col-form-label">Email<span
                                        class="text-danger">☆</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" id="email"
                                        placeholder="admin@thatswe.de">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="add-item-btn" onclick="_run(this)"
                            data-el="fg" data-form="form-add-new"
                            data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
                            data-callback="addSuccessCallBack" data-btnid="add-item-btn" data-file='true'>Save Agency
                            Details</button>
                        <button type="button" class="btn btn-danger cancel_modal" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Update Model Modal -->
    <div class="modal fade text-start" id="update-item-modal" tabindex="-1" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="update-modal-content">

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
        // $('.dataTables_filter .form-control').removeClass('form-control-sm');
        // $('.dataTables_length .form-select').removeClass('form-select-sm').removeClass('form-control-sm');
        var dt_ajax_table = $('.datatables-ajax');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Ajax Sourced Server-side datatable
        // --------------------------------------------------------------------
        if (dt_ajax_table.length) {

            feather.replace();
            var datatable = dt_ajax_table.DataTable({
                "processing": true,
                "serverSide": true,
                "searching": false,
                "lengthChange": false,
                "buttons": true,
                "dom": 'B<"clear">lfrtip',
                buttons: [{
                        extend: 'csv',
                        text: 'csv',
                        className: 'btn btn-success btn-sm',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                        },
                        action: serverSideButtonAction
                    },
                    {
                        extend: 'excel',
                        text: 'excel',
                        className: 'btn btn-warning btn-sm',
                        action: serverSideButtonAction
                    },
                    {
                        extend: 'pdf',
                        text: 'pdf',
                        className: 'btn btn-warning btn-sm',
                        action: serverSideButtonAction
                    },
                ],
                "ajax": {
                    "url": "{{ route('agency.zip.show.retrieve') }}",
                    "type": "POST",
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include CSRF token in the headers
                    },
                    "data": function(d) {
                        return $.extend({}, d, {
                            "month": $("#month").val(),
                            "value_from_start_date": $("#value_from_start_date").val(),
                            "value_from_end_date": $("#value_from_end_date").val(),
                            "transaction_for": $("#transaction_for").val(),
                            "email": $("#email").val()
                        });
                    }
                },

                "columns": [{
                        "data": "zip",
                    },
                    {
                        "data": "company_name",
                    },
                    {
                        "data": "city"
                    },
                    {
                        "data": "street",
                    },
                    {
                        "data": "telephone"
                    },
                    {
                        "data": "www"
                    },
                    {
                        "data": "mail_address"
                    },
                    {
                        "data": "action",

                    },
                ],

                "order": [
                    [7, 'desc']
                ],
                "drawCallback": function(settings) {
                    var rows = this.fnGetData();
                    if (rows.length !== 0) {
                        feather.replace();
                    }
                }
            });


            $(document).on('click', '[data-success-delete]', function() {
                // Get the ID of the todo item to be deleted
                var todoItemId = $(this).data('success-delete');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ms-1'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('agency.zip.delete') }}",
                            data: {
                                id: todoItemId,
                                _token: '{{ csrf_token() }}' // Include CSRF token
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.status === true) {
                                    datatable.draw();
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: 'Your file has been deleted.',
                                        customClass: {
                                            confirmButton: 'btn btn-success'
                                        }
                                    });
                                } else {
                                    notify('error', response.message, 'Agency by Zip Deleting');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error: ' + error);
                                alert('An error occurred while deleting the item.');
                            }
                        });
                    }
                });

            });

            $(document).on('click', "[data-success-edit]", function(e) {
                let dataId = $(this).data('success-edit');
                $.ajax({
                    type: "POST",
                    url: "{{ route('agency.zip.update.fetch') }}", // Adjust the route according to your setup
                    dataType: "json",
                    data: {
                        id: dataId
                    },
                    success: function(response) {
                        // Render the update modal content dynamically
                        $('#update-modal-content').html(response.modalContent);
                        // Show the update modal
                        $('#update-item-modal').modal('show');
                        if (feather) {
                            feather.replace({
                                width: 14,
                                height: 14
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + error);
                    }
                });

            });

        }

        var cencelModal = $('.cancel_modal');

        function addSuccessCallBack(data) {
            $('#add-item-btn').prop('disabled', false);
            if (data.status == true) {
                notify('success', data.message, 'Agency Adding');
                cencelModal.trigger('click');
                $('#form-add-new')[0].reset();
                datatable.draw();
            } else {
                if (data.message != null) {
                    notify('error', data.message, 'Agency Adding');
                    $.validator("form-add-new", data.errors);

                } else {
                    notify('error', 'Something Went Wrong!', 'Agency Adding');
                    $.validator("form-add-new", data.errors);
                }
            }
        }

        function updateSuccessCallBack(data) {
            if (data.status == true) {
                notify('success', data.message, 'Agency Updating');
                $('#update-item-modal').find('.cancel_modal').trigger('click');
                datatable.draw();
            } else {
                if (data.message != null) {
                    notify('error', data.message, 'Agency Updating');
                    $.validator("form-update", data.errors);

                } else {
                    notify('error', 'Something Went Wrong!', 'Agency Updating');
                    $.validator("form-update", data.errors);
                }
            }
        }
    </script>
@stop
<!-- BEGIN: page JS -->
