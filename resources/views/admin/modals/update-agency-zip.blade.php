<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel33">Update Agency Details</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="form-update" onsubmit="return false" action="{{ route('agency.zip.update') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $itemData->id }}">
    <div class="modal-body form-block p-5">
        <div id="admin-update-form-field">
            <div class="mb-1 row">
                <label for="zip" class="col-sm-3 col-form-label">ZIP Code<span class="text-danger">☆</span></label>
                <div class="col-sm-9">
                    <input type="text" name="zip" class="form-control" id="zip" placeholder="6001"
                        value="{{ $itemData->zip }}">
                </div>
            </div>
            <div class="mb-1 row">
                <label for="company" class="col-sm-3 col-form-label">Company Name<span
                        class="text-danger">☆</span></label>
                <div class="col-sm-9">
                    <input type="text" name="company_name" class="form-control" id="company" placeholder="ThatsWe"
                        value="{{ $itemData->company_name }}">
                </div>
            </div>
            <div class="mb-1 row">
                <label for="city" class="col-sm-3 col-form-label">City<span class="text-danger">☆</span></label>
                <div class="col-sm-9">
                    <input type="text" name="city" class="form-control" id="city" placeholder="Frankforth"
                        value="{{ $itemData->city }}">
                </div>
            </div>
            <div class="mb-1 row">
                <label for="street" class="col-sm-3 col-form-label">Street<span class="text-danger">☆</span></label>
                <div class="col-sm-9">
                    <input type="text" name="street" class="form-control" id="street"
                        placeholder="Masterstreet 6" value="{{ $itemData->street }}">
                </div>
            </div>
            <div class="mb-1 row">
                <label for="site_url" class="col-sm-3 col-form-label">WWW<span class="text-danger">☆</span></label>
                <div class="col-sm-9">
                    <input type="text" name="site_url" class="form-control" id="site_url" placeholder="thatswe.de"
                        value="{{ $itemData->site_url }}">
                </div>
            </div>

            <div class="mb-1 row">
                <label for="telephone" class="col-sm-3 col-form-label">Telephone<span
                        class="text-danger">☆</span></label>
                <div class="col-sm-9">
                    <input type="text" name="telephone" class="form-control" id="telephone"
                        placeholder="0049 425 78547" value="{{ $itemData->telephone }}">
                </div>
            </div>
            <div class="mb-1 row">
                <label for="email" class="col-sm-3 col-form-label">Email<span class="text-danger">☆</span></label>
                <div class="col-sm-9">
                    <input type="text" name="email" class="form-control" id="email"
                        placeholder="admin@thatswe.de" value="{{ $itemData->email }}">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="update-item-btn" onclick="_run(this)" data-el="fg"
            data-form="form-update"
            data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
            data-callback="updateSuccessCallBack" data-btnid="update-item-btn" data-file='true'>Update Agency
            Details</button>
        <button type="button" class="btn btn-danger cancel_modal" data-bs-dismiss="modal">Close</button>
    </div>
</form>
