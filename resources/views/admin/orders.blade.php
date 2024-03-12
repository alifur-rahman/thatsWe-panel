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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom d-flex justfy-content-between">
                                    <h4 class="card-title">{{ __('Filter') }}</h4>
                                    <div class="btn-exports d-flex justify-content-between">
                                        <select data-placeholder="Select a state..." class="select2-icons form-select"
                                            id="fx-export">
                                            <option value="download" data-icon="download" selected>
                                                {{ __('Export') }}</option>
                                            <option value="csv" data-icon="file">CSV</option>
                                            <option value="excel" data-icon="file">Excel</option>
                                        </select>
                                    </div>
                                </div>
                                <!--Search Form -->
                                <div class="card-body mt-2">
                                    <form class="dt_adv_search" method="POST" id="filter-form">
                                        <div class="row g-1 mb-md-1">
                                            <div class="col-md-4">
                                                <label class="form-label"
                                                    for="month">{{ __('Search by month') }}</label>
                                                <select class="select2 form-select" id="month" name="month">
                                                    <option value="">{{ __('All') }}</option>
                                                    <option value="this_month">{{ __('This Month') }}</option>
                                                    <option value="last_month">{{ __('Last Month') }}</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">{{ __('Date') }}</label>
                                                <div class="mb-0">
                                                    <input type="text"
                                                        class="form-control dt-date flatpickr-range dt-input"
                                                        data-column="5" placeholder="StartDate to EndDate"
                                                        data-column-index="4" name="dt_date" />
                                                    <input type="hidden" class="form-control dt-date start_date dt-input"
                                                        data-column="5" data-column-index="4" id="value_from_start_date"
                                                        name="value_from_start_date" />
                                                    <input type="hidden" class="form-control dt-date end_date dt-input"
                                                        id="value_from_end_date" name="value_from_end_date"
                                                        data-column="5" data-column-index="4" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">{{ __('Status') }}</label>
                                                <select class="select2 form-select" id="transaction_for"
                                                    name="transaction_for">
                                                    <option value="">{{ __('All') }}</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row g-1">
                                            <div class="col-md-4">
                                                <label class="form-label">{{ __('Email') }}</label>
                                                <input id="email" name="email" type="text"
                                                    class="form-control dt-input" data-column="4"
                                                    placeholder="{{ __('Email') }}" data-column-index="3" />
                                            </div>

                                            <div class="col-md-8">
                                                <div class="row mt-2">
                                                    <div class="col-lg-6 d-grid">
                                                        <button id="btn-reset" type="button"
                                                            class="btn btn-secondary">{{ __('Reset') }}</button>
                                                    </div>
                                                    <div class="col-lg-6 d-grid">
                                                        <button id="btn-filter" type="button"
                                                            class="btn btn-primary">{{ __('Filter') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <hr class="my-0" />
                            </div>

                            <div class="card">
                                <div class="card-datatable">
                                    <table class="datatables-ajax ib-withdraw table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Company Name') }}</th>
                                                <th>{{ __('Street') }}</th>
                                                <th>{{ __('ZIP') }}</th>
                                                <th>{{ __('City') }}</th>
                                                <th>{{ __('Country') }}</th>
                                                <th>{{ __('telephone') }}</th>
                                                <th>{{ __('WWW') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Managing Director/Contact') }}</th>
                                                <th>{{ __('Agency') }}</th>
                                                <th>{{ __('Date') }}</th>
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
        // Datepicker for advanced filter
        // ---------------------------------------------------------------------------
        var separator = ' - ',
            rangePickr = $('.flatpickr-range'),
            dateFormat = 'MM/DD/YYYY';
        var options = {
            autoUpdateInput: false,
            autoApply: true,
            locale: {
                format: dateFormat,
                separator: separator
            },
            opens: $('html').attr('data-textdirection') === 'rtl' ? 'left' : 'right'
        };

        //Range Picker
        // ---------------------------------------------------------------------------------------------
        if (rangePickr.length) {
            rangePickr.flatpickr({
                mode: 'range',
                dateFormat: 'm/d/Y',
                onClose: function(selectedDates, dateStr, instance) {
                    var startDate = '',
                        endDate = new Date();
                    if (selectedDates[0] != undefined) {
                        startDate =
                            selectedDates[0].getMonth() + 1 + '/' + selectedDates[0].getDate() + '/' +
                            selectedDates[0].getFullYear();
                        $('.start_date').val(startDate);
                    }
                    if (selectedDates[1] != undefined) {
                        endDate =
                            selectedDates[1].getMonth() + 1 + '/' + selectedDates[1].getDate() + '/' +
                            selectedDates[1].getFullYear();
                        $('.end_date').val(endDate);
                    }
                    $(rangePickr).trigger('change').trigger('keyup');
                }
            });
        }



        $('.dataTables_filter .form-control').removeClass('form-control-sm');
        $('.dataTables_length .form-select').removeClass('form-select-sm').removeClass('form-control-sm');
        var dt_ajax_table = $('.datatables-ajax');
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
                    "url": "{{ route('order.show.retrieve') }}",
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
                        "data": "company_name",
                    },
                    {
                        "data": "street",
                    },
                    {
                        "data": "zip",
                    },
                    {
                        "data": "city"
                    },
                    {
                        "data": "country"
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
                        "data": "managing_director"
                    },
                    {
                        "data": "agency_id"
                    },
                    {
                        "data": "date"
                    },
                ],
                "columnDefs": [{
                    "targets": 1,
                    "orderable": false
                }],
                "order": [
                    [5, 'desc']
                ],
                "drawCallback": function(settings) {
                    var rows = this.fnGetData();
                    if (rows.length !== 0) {
                        feather.replace();
                    }
                }
            });
            // Filter operation
            $("#btn-filter").on("click", function(e) {
                console.log($(".start_date").val());
                datatable.draw();
            });
            // reset operation
            $("#btn-reset").on("click", function(e) {
                $(".start_date").val('');
                $(".end_date").val('');
                $('#month').prop('selectedIndex', 0).trigger("change");
                $("#filter-form").trigger('reset');
                datatable.draw();
            });

        }


        $(document).on("click", ".dt-description", function(params) {
            let __this = $(this);
            let dataId = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{ route('order.details.retrieve') }}",
                data: {
                    id: dataId
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status == true) {
                        if ($(__this).closest("tr").next().hasClass("description")) {
                            $(__this).closest("tr").next().remove();
                            $(__this).find('.w').html(feather.icons['plus'].toSvg());
                        } else {
                            $(__this).closest('tr').after(data.description);
                            $(__this).closest('tr').next('.description').slideDown('slow').delay(5000);
                            $(__this).find('.w').html(feather.icons['minus'].toSvg());
                        }
                    }
                }
            })
        });



        // datatable export function
        $(document).on("change", "#fx-export", function() {
            if ($(this).val() === 'csv') {
                $(".buttons-csv").trigger('click');
            }
            if ($(this).val() === 'excel') {
                $(".buttons-excel").trigger('click');
            }
            console.log($(this).val());
            if ($(this).val() === 'pdf') {
                $(".buttons-pdf").trigger('click');
            }

        });
    </script>
@stop
<!-- BEGIN: page JS -->
