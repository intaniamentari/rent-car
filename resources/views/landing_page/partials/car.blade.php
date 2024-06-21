<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end" style="background-image: url(landing_page/images/car-1.jpg);">
        </div>
        <div class="text">
            <h2 class="mb-0"><a href="{{ route('cars-detail') }}">{{ $vehicle->brand }}</a></h2>
            <div class="d-flex mb-3">
                <span class="cat">{{ $vehicle->model }}</span>
                <p class="price ml-auto">{{ $vehicle->charge }} <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="{{ route('cars-detail') }}" class="btn btn-secondary py-2 ml-1">Details</a></p>
        </div>
    </div>
</div>
