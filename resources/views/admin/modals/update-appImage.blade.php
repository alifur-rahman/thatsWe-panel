<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
<div class="modal-header mb-1">
    <h5 class="modal-title">Update {{ $itemData->title }}</h5>
</div>
<form id="form-update-new" class="h-100" onsubmit="return false" action="{{ route('content.app-images.update') }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $itemData->id }}">
    <div class="modal-body flex-grow-1 h-100">
        <div class="d-flex justify-content-between flex-column h-100">
            <div class="al_tab_wrapper">
                <ul class="nav nav-tabs tabs-line">
                    <li class="nav-item">
                        <a class="nav-link nav-link-update active" data-bs-toggle="tab" href="#tab-update-u">
                            <i data-feather="edit"></i>
                            <span class="align-middle">Cover</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-activity" data-bs-toggle="tab" href="#tab-activity-u">
                            <i data-feather="activity"></i>
                            <span class="align-middle">Screenshort</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content mt-2">
                    <div class="tab-pane tab-pane-update fade show active" id="tab-update-u" role="tabpanel">
                        <div class="update-item-form">
                            <div class="mb-1">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Enter Title" value="{{ $itemData->title }}" />
                            </div>

                            <div class="mb-1">
                                <label for="screen_logo" class="form-label">Attachments</label>
                                <input class="form-control file-attachments" type="file" name="screen_logo"
                                    id="screen_logo" data-show-id="#showscreen_logo-u" />
                            </div>


                            <div class="mb-1">
                                <label class="form-label">Assigned</label>
                                <ul class="assigned ps-0 text-center">
                                    <img id="showscreen_logo-u" src="{{ url('../' . $itemData->screen_logo) }}"
                                        alt="">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tab-pane-activity pb-1 fade" id="tab-activity-u" role="tabpanel">
                        <div class="mb-1">
                            <label for="screenshot" class="form-label">Attachments</label>
                            <input name="screenshot" class="form-control file-attachments"
                                data-show-id="#showScreenshort-u" type="file" id="screenshot" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Assigned</label>
                            <ul class="assigned ps-0 text-center">
                                <img id="showScreenshort-u" src="{{ url('../' . $itemData->screenshot) }}"
                                    alt="">
                            </ul>

                        </div>

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
