@extends('layouts.admin-layout')
@section('title', 'Content | List of Agencies')

@section('vendor-css')


@stop
<!-- BEGIN: Page CSS-->
@section('page-css')
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

            padding: 0;
        }

        .todo-task-list {
            height: 100%;
            list-style: decimal;
        }


        .dark-layout .todo-application .content-area-wrapper .content-right .todo-task-list-wrapper {
            background-color: #161d31 !important;
            border-color: #3b4253;
        }

        .todo-application .content-area-wrapper .content-right .todo-task-list-wrapper {

            height: 100%;
        }

        .al_app_images_card {
            cursor: pointer;
        }

        .al_app_images_card img {
            width: 100%;
            border-radius: 4px;
        }

        .assigned img {
            max-width: 100%;
        }
    </style>
@stop
<!-- END: Page CSS-->
<!-- BEGIN: Content-->
@section('content')
    <div class="app-content content todo-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
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
                                    <a href="#" data-filte-by="all"
                                        class="list-group-item list-group-item-action active">
                                        <i data-feather="mail" class="font-medium-3 me-50"></i>
                                        <span class="align-middle">All</span>
                                    </a>
                                    <a href="#" data-filte-by="hold" class="list-group-item list-group-item-action">
                                        <i data-feather="star" class="font-medium-3 me-50"></i> <span
                                            class="align-middle">hold</span>
                                    </a>
                                    <a href="#" data-filte-by="active" class="list-group-item list-group-item-action">
                                        <i data-feather="check" class="font-medium-3 me-50"></i> <span
                                            class="align-middle">Active</span>
                                    </a>

                                </div>
                                <div class="mt-3 px-2 d-flex justify-content-between">
                                    <h6 class="section-label mb-1">Added By</h6>
                                    {{-- <i data-feather="plus" class="cursor-pointer"></i> --}}
                                </div>
                                <div class="list-group list-group-labels">
                                    <a href="#" data-filte-by="admin"
                                        class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-primary me-1"></span>Admin
                                    </a>
                                    <a href="#" data-filte-by="customer"
                                        class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-success me-1"></span>Customer
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
                        <div class="todo-task-list-wrapper p-2 ">
                            <div class="row " id="show_loaded_data">

                            </div>
                        </div>


                        <!-- Right Sidebar starts -->
                        <div class="modal modal-slide-in sidebar-todo-modal fade" id="update-item-modal">
                            <div class="modal-dialog sidebar-lg">
                                <div class="modal-content p-0" id="update-modal-content">

                                </div>
                            </div>
                        </div>
                        <!-- Right Sidebar ends -->

                        <!-- Right Sidebar starts -->
                        <div class="modal modal-slide-in update-item-sidebar fade" id="add-new-task-modal">
                            <div class="modal-dialog sidebar-lg">
                                <div class="modal-content p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="">Add New agency</h5>
                                    </div>
                                    <form id="form-add-new" class="h-100" onsubmit="return false"
                                        action="{{ route('agency.submit') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body flex-grow-1 h-100">

                                            <div class="d-flex justify-content-between flex-column h-100">
                                                <div class="al_tab_wrapper">
                                                    <div class="update-item-form">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="app_name">App Name</label>
                                                            <input type="text" id="app_name" name="app_name"
                                                                class="form-control" placeholder="Enter app name" />
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="app_no">App No</label>
                                                            <input type="text" id="app_no" name="app_no"
                                                                class="form-control" placeholder="Enter app no" />
                                                        </div>

                                                        <div class="mb-1">
                                                            <label for="app_logo" class="form-label">App Logo</label>
                                                            <input class="form-control file-attachments" type="file"
                                                                name="app_logo" id="app_logo"
                                                                data-show-id="#showscreen_logo" />
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label">Assigned</label>
                                                            <ul class="assigned ps-0 text-center">
                                                                <img id="showscreen_logo" src="" alt="">
                                                            </ul>
                                                        </div>

                                                        <input type="hidden" name="added_by" value="admin">

                                                        <div class="mb-1">
                                                            <label for="show" class="form-label">Status</label>
                                                            <select class="form-select" name="show" id="show">
                                                                <option value="hold">Hold</option>
                                                                <option value="active">Active</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-1">
                                                    <div class="d-flex flex-wrap">
                                                        <button class="btn btn-primary me-1" id="add-image"
                                                            onclick="_run(this)" data-el="fg" data-form="form-add-new"
                                                            data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
                                                            data-callback="addSuccessCallBack" data-btnid="add-image"
                                                            data-file='true'>Save</button>



                                                        <button class="btn btn-outline-secondary cancel_modal"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
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
@stop

@section('page-js')
    <script src="{{ asset('admin-assets/app-assets/js/scripts/pages/app-todo.js') }}"></script>

    <script>
        var loaderImPath = "{{ asset('/comon-icon/ajax-loader-big.gif') }}";

        function dataRetrive(filterType) {
            var loaderHtml =
                '<div class="al_ajax_loder"><img src="' + loaderImPath + '" alt="Loading"></div>';
            $('#show_loaded_data').html(loaderHtml);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('agency.show.retrieve') }}",
                dataType: "json",
                data: {
                    filterType: filterType // Send filterType in the AJAX request
                },
                success: function(data) {
                    if (data.status == true) {
                        $('#show_loaded_data').html(data.data);
                    }
                }
            });
        }

        function uploadImageShow() {
            $('[data-show-id]').on('change', function() {
                var input = $(this)[0];
                var showId = $(this).data('show-id');
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(showId).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        }

        $(document).on('click', "[data-image-id]", function(e) {

            let dataId = $(this).data('image-id');

            $.ajax({
                type: "POST",
                url: "{{ route('agency.update.fetch') }}", // Adjust the route according to your setup
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
                    uploadImageShow();
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + error);
                }
            });

        });

        var cencelModal = $('.cancel_modal');

        function addSuccessCallBack(data) {
            $('#add-image').prop('disabled', false);
            if (data.status == true) {
                notify('success', data.message, 'Agency Adding');
                cencelModal.trigger('click');
                dataRetrive();
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
                dataRetrive();
            } else {
                if (data.message != null) {
                    notify('error', data.message, 'Agency Updating');
                    $.validator("form-update-new", data.errors);

                } else {
                    notify('error', 'Something Went Wrong!', 'Agency Updating');
                    $.validator("form-update-new", data.errors);
                }
            }
        }



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
                        url: "{{ route('agency.delete') }}",
                        data: {
                            id: todoItemId,
                            _token: '{{ csrf_token() }}' // Include CSRF token
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.status === true) {
                                $('#update-item-modal').find('.cancel_modal').trigger('click');
                                dataRetrive();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Your file has been deleted.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                });
                            } else {
                                notify('error', response.message, 'Agency Deleting');
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

        $(document).ready(function() {
            dataRetrive();
            uploadImageShow();
            $('[data-filte-by]').click(function() {
                var filterType = $(this).attr('data-filte-by'); // Get the filter type
                dataRetrive(filterType); // Call dataRetrieve function with filter type
            });

        });
    </script>

@endsection
