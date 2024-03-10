@foreach ($appImagesData as $single)
    <div class="col-md-3 col-lg-3">
        <div class="card al_app_images_card" data-image-id="{{ $single->id }}">
            <div class="card-body">
                <h4 class="card-title">{{ $single->title }}</h4>
                <img class="img-fluid" src="{{ url('../' . $single->screen_logo) }}" alt="{{ $single->title }}">
                <!-- Assuming 'screen_logo' is the column name in your database containing the image paths -->
            </div>
        </div>
    </div>
@endforeach
