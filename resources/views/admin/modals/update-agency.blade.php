<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
<div class="modal-header mb-1">
    <h5 class="">Update: {{ $itemData->app_name }}</h5>
</div>
<form id="form-update-new" class="h-100" onsubmit="return false" action="{{ route('agency.update') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $itemData->id }}">
    <div class="modal-body flex-grow-1 h-100">

        <div class="d-flex justify-content-between flex-column h-100">
            <div class="al_tab_wrapper">
                <div class="update-item-form">
                    <div class="mb-1">
                        <label class="form-label" for="app_name">App Name</label>
                        <input type="text" id="app_name" name="app_name" class="form-control"
                            placeholder="Enter app name" value="{{ $itemData->app_name }}" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="app_no">App No</label>
                        <input type="text" id="app_no" name="app_no" class="form-control"
                            placeholder="Enter app no" value="{{ $itemData->app_no }}" />
                    </div>

                    <div class="mb-1">
                        <label for="app_logo" class="form-label">App Logo</label>
                        <input class="form-control file-attachments" type="file" name="app_logo" id="app_logo"
                            data-show-id="#showscreen_logo" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Assigned</label>
                        <ul class="assigned ps-0 text-center">
                            <img id="showscreen_logo" src="{{ url('../' . $itemData->app_logo) }}" alt="">
                        </ul>
                    </div>

                    <input type="hidden" name="added_by" value="{{ $itemData->added_by }}">

                    <div class="mb-1">
                        <label for="show" class="form-label">Status</label>
                        <select class="form-select" name="show" id="show">

                            <option value="hold" @if ($itemData->show == 'hold') selected @endif>Hold</option>
                            <option value="active" @if ($itemData->show == 'active') selected @endif>Active</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-1">
                <div class="d-flex flex-wrap">
                    <button class="btn btn-primary me-1" id="add-image" onclick="_run(this)" data-el="fg"
                        data-form="form-update-new"
                        data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
                        data-callback="updateSuccessCallBack" data-btnid="add-image" data-file='true'>Update</button>



                    <button class="btn btn-outline-secondary cancel_modal me-1" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-danger update-btn"
                        data-success-delete="{{ $itemData->id }}">
                        Delete
                    </button>
                </div>
            </div>
        </div>

    </div>
</form>
