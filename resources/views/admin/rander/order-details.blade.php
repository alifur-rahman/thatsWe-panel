<tr class="description" style="display:none">
    <td colspan="7">
        <div class="details-section-dark dt-details border-start-3 border-start-primary p-2">
            <div class="row">
                <div class="col-lg-6">
                    <div class="rounded-0 w-75">
                        <table class="table table-responsive tbl-balance">
                            <tr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card al_app_images_card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">

                                                    @if ($itemData->agency->show == 'active')
                                                        <div class="badge rounded-pill badge-light-success mb-2">
                                                            {{ $itemData->agency->show }} </div>
                                                    @else
                                                        <div class="badge rounded-pill badge-light-warning mb-2">
                                                            {{ $itemData->agency->show }} </div>
                                                    @endif
                                                    @if ($itemData->agency->added_by == 'admin')
                                                        <p class="card-text mb-0"><code>Admin</code></p>
                                                    @else
                                                        <p class="card-text mb-0"><code>Customer</code></p>
                                                    @endif

                                                </div>

                                                <img class="img-fluid"
                                                    src="{{ url('../' . $itemData->agency->app_logo) }}"
                                                    alt="{{ $itemData->agency->app_name }}">
                                                <h4 class="card-title mt-2">App Name : {{ $itemData->agency->app_name }}
                                                </h4>
                                                <h6 class="card-subtitle text-muted "> Logo No :
                                                    {{ $itemData->agency->app_no }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justfy-content-between flex-column">
                    <div class="rounded-0 w-100">
                        <table class="table table-responsive tbl-trader-details">
                            <tr>
                                <th>App Name</th>
                                <td>{{ $itemData->agency->app_name }}</td>
                            </tr>
                            <tr>
                                <th>Logo No</th>
                                <td>{{ $itemData->agency->app_no }}</td>
                            </tr>
                            <tr>
                                <th>Added By</th>
                                <td>
                                    <p class="card-text mb-0"><code>{{ $itemData->agency->added_by }}</code></p>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($itemData->agency->show == 'active')
                                        <div class="badge rounded-pill badge-light-success ">
                                            {{ $itemData->agency->show }} </div>
                                    @else
                                        <div class="badge rounded-pill badge-light-warning">
                                            {{ $itemData->agency->show }} </div>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between flex-row mt-2 gap-2">
                        <button type="button" class="btn btn-outline-primary w-100 "
                            data-pdf-show="{{ url('../' . $itemData->pdf_url) }}">
                            <i data-feather="eye" class="me-25"></i>
                            <span>View PDF</span>
                        </button>
                        <a href="{{ url('../' . $itemData->pdf_url) }}" download="{{ $itemData->company_name }}.pdf"
                            class="btn btn-success w-100">
                            <i data-feather="download" class="me-25"></i>
                            <span>Download PDF</span>
                        </a>

                    </div>
                    <div class="d-flex justify-content-between flex-row mt-2 gap-2">
                        <button type="button" class=" w-100 btn btn-outline-danger update-btn"
                            data-success-delete="{{ $itemData->id }}">
                            <i data-feather="trash" class="me-25"></i>
                            Delete Order
                        </button>
                    </div>

                    <div class="d-flex justify-content-between flex-column gap-2">
                        <div>
                            <hr class="bg-gradient">
                            <div class="d-flex justify-content-between flex-column">
                                <small class="mb-1 text-center">Add this order to agency by zip to show this details
                                    <br> into
                                    "Travel
                                    agencies
                                    with
                                    thatsWE by zip code" in <a target="_blank"
                                        href="https://thatssoft.de/policy">Thatssoft</a> </small>
                                <div id="zip_agency_resultBox-{{ $itemData->id }}">
                                    @if ($isZipAgency)
                                        <div class="card mb-0">
                                            <div class="card-body border-start-3 border-start-primary">
                                                <div class="d-flex gap-2">
                                                    <div class="section-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100"
                                                            height="100" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-thumbs-up icon-trd text-primary">
                                                            <path
                                                                d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div class="section-data">
                                                        <div class="tv-title">
                                                            This order details already added in agency by
                                                            zip
                                                        </div>
                                                        <div class="tv-total">

                                                            <small> To see all go to <a target="_blank"
                                                                    href="{{ route('agency.zip.show') }}">Agency By
                                                                    ZIP</a></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <form action="{{ route('order.add.to.agency.zip') }}" method="post"
                                            id="form-add-agency_zip">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{ $itemData->id }}">
                                            <button type="button" class="w-100 btn btn-outline-info"
                                                id="add-zip_agency-btn" onclick="_run(this)" data-el="fg"
                                                data-form="form-add-agency_zip"
                                                data-loading="<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
                                                data-callback="addAgecnyZipSuccessCallBack"
                                                data-btnid="add-zip_agency-btn" data-file="true">
                                                <i data-feather="send" class="me-25"></i>
                                                Add into agecy By ZIP</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <hr class="bg-gradient">


                        </div>

                    </div>


                </div>
            </div>

            <hr>

            <div class="clearfix"></div>
        </div>
    </td>
    <td class="d-none">&nbsp;</td>
    <td class="d-none">&nbsp;</td>
    <td class="d-none">&nbsp;</td>
    <td class="d-none">&nbsp;</td>




</tr>
