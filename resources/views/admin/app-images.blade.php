@extends('layouts.admin-layout')
@section('title', 'Content | Images From ThatWE App')

@section('vendor-css')
@stop
<!-- BEGIN: Page CSS-->
@section('page-css')
    <style>
        .al_app_images_card {
            cursor: pointer;
        }

        .al_app_images_card img {
            width: 100%;
            border-radius: 50%;
        }

        .assigned img {
            max-width: 100%;
        }
    </style>
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
                    <div class="col-12">
                        <ul class="nav nav-pills mb-2">
                            <!-- account -->
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-bs-toggle="modal"
                                    data-bs-target="#add-new-task-modal">
                                    <i data-feather='plus'></i>
                                    <span class="fw-bold">Add New</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="row" id="show_loaded_data">

                </div>
            </div>
        </div>
    </div>


    <!-- Kanban Sidebar starts -->
    <div class="modal modal-slide-in update-item-sidebar fade" id="add-new-task-modal">
        <div class="modal-dialog sidebar-lg">
            <div class="modal-content p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title">Add New</h5>
                </div>
                <form id="form-add-new" class="h-100" onsubmit="return false"
                    action="{{ route('content.app-images.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body flex-grow-1 h-100">

                        <div class="d-flex justify-content-between flex-column h-100">
                            <div class="al_tab_wrapper">
                                <ul class="nav nav-tabs tabs-line">
                                    <li class="nav-item">
                                        <a class="nav-link nav-link-update active" data-bs-toggle="tab" href="#tab-update">
                                            <i data-feather="edit"></i>
                                            <span class="align-middle">Cover</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link nav-link-activity" data-bs-toggle="tab" href="#tab-activity">
                                            <i data-feather="activity"></i>
                                            <span class="align-middle">Screenshort</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-2">
                                    <div class="tab-pane tab-pane-update fade show active" id="tab-update" role="tabpanel">
                                        <div class="update-item-form">
                                            <div class="mb-1">
                                                <label class="form-label" for="title">Title</label>
                                                <input type="text" id="title" name="title" class="form-control"
                                                    placeholder="Enter Title" />
                                            </div>

                                            <div class="mb-1">
                                                <label for="screen_logo" class="form-label">Attachments</label>
                                                <input class="form-control file-attachments" type="file"
                                                    name="screen_logo" id="screen_logo" data-show-id="#showscreen_logo" />
                                            </div>


                                            <div class="mb-1">
                                                <label class="form-label">Assigned</label>
                                                <ul class="assigned ps-0 text-center">
                                                    <img id="showscreen_logo" src="" alt="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane tab-pane-activity pb-1 fade" id="tab-activity" role="tabpanel">
                                        <div class="mb-1">
                                            <label for="screenshot" class="form-label">Attachments</label>
                                            <input name="screenshot" class="form-control file-attachments"
                                                data-show-id="#showScreenshort" type="file" id="screenshot" />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Assigned</label>
                                            <ul class="assigned ps-0 text-center">
                                                <img id="showScreenshort" src="" alt="">
                                            </ul>

                                        </div>

                                    </div>


                                </div>
                            </div>

                            <div class="mb-1">
                                <div class="d-flex flex-wrap">
                                    <button class="btn btn-primary me-1" id="add-image" onclick="_run(this)" data-el="fg"
                                        data-form="form-add-new"
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
    <!-- Kanban Sidebar ends -->

    <!-- Kanban Sidebar starts -->
    <div class="modal modal-slide-in update-item-sidebar fade" id="update-item-modal">
        <div class="modal-dialog sidebar-lg">
            <div class="modal-content p-0" id="update-modal-content">

            </div>
        </div>
    </div>
    <!-- Kanban Sidebar ends -->


@stop
<!-- END: Content-->


@section('page-js')
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
                url: "{{ route('content.app-image-retrieve') }}",
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


        $(document).on('click', "[data-image-id]", function(e) {

            let dataId = $(this).data('image-id');

            $.ajax({
                type: "POST",
                url: "{{ route('image_update.fetch') }}", // Adjust the route according to your setup
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
                notify('success', data.message, 'App Images');
                cencelModal.trigger('click');
                dataRetrive();
            } else {
                if (data.message != null) {
                    notify('error', data.message, 'Add Success Info');
                    $.validator("form-add-new", data.errors);

                } else {
                    notify('error', 'Something Went Wrong!', 'Add Success Info');
                    $.validator("form-add-new", data.errors);
                }
            }
        }

        function updateSuccessCallBack(data) {
            if (data.status == true) {
                notify('success', data.message, 'Update App Image');
                $('#form-update-new').find('.cancel_modal').trigger('click');
                dataRetrive();
            } else {
                if (data.message != null) {
                    notify('error', data.message, 'Update App Image');
                    $.validator("form-update-new", data.errors);

                } else {
                    notify('error', 'Something Went Wrong!', 'Update Success Info');
                    $.validator("form-update-new", data.errors);
                }
            }
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


        $(document).on('click', '[data-success-delete]', function() {
            // Get the ID of the todo item to be deleted
            var itemId = $(this).data('success-delete');
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
                        url: "{{ route('content.app-image.delete') }}",
                        data: {
                            id: itemId,
                            _token: '{{ csrf_token() }}' // Include CSRF token
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.status === true) {
                                $('#form-update-new').find('.cancel_modal').trigger('click');
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
                                notify('error', data.message, 'Delete App Image');
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

        });
    </script>
@endsection
