@foreach ($allData as $single)
    <div class="col-md-3 col-lg-3">
        <div class="card al_app_images_card" data-image-id="{{ $single->id }}">
            <div class="card-body">
                <div class="d-flex justify-content-between">

                    @if ($single->show == 'active')
                        <div class="badge rounded-pill badge-light-success mb-2"> {{ $single->show }} </div>
                    @else
                        <div class="badge rounded-pill badge-light-warning mb-2"> {{ $single->show }} </div>
                    @endif
                    @if ($single->added_by == 'admin')
                        <p class="card-text mb-0"><code>Admin</code></p>
                    @else
                        <p class="card-text mb-0"><code>Customer</code></p>
                    @endif

                </div>

                <img class="img-fluid" src="{{ url('../' . $single->app_logo) }}" alt="{{ $single->app_name }}">
                <h4 class="card-title mt-2">App Name : {{ $single->app_name }}</h4>
                <h6 class="card-subtitle text-muted "> Logo No : {{ $single->app_no }}</h6>
            </div>
        </div>
    </div>
@endforeach
