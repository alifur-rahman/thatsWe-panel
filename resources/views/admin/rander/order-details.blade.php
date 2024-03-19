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
