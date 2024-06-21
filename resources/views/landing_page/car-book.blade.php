@extends('landing_page.layouts.master')

@section('content')
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('landing_page/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
	            <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
            </div>
          </div>
        </div>
      </div>
    </div>

     <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-12 align-items-center">
	  						<form id="carbook-form" action="{{ route('checkVehicle') }}" method="post" class="request-form ftco-animate bg-primary">
                                @csrf
                                <h2>Rent your car</h2>
			    				<div class="form-group">
			    					<label for="" class="label">Choose Car</label>
			    					{{-- <input type="text" class="form-control" placeholder="City, Airport, Station, etc"> --}}
                                    <select class="form-control" name="vehicle" id="exampleFormControlSelect1" aria-label="Default select example">
                                        <option style="color: black;" selected="">Open this select menu</option>
                                        @foreach ($vehicles as $vehicle)
                                            <option style="color: black;" value="{{ $vehicle->id }}">{{ $vehicle->brand }} - {{ $vehicle->model }}</option>
                                        @endforeach
                                    </select>
			    				</div>
			    				<div class="d-flex">
			    					<div class="form-group mr-2">
                                        <label for="" class="label">Rent start</label>
                                        <input type="date" name="start_rent" class="form-control" placeholder="Date">
                                    </div>
                                    <div class="form-group ml-2">
                                        <label for="" class="label">Rent end</label>
                                        <input type="date" name="finish_rent" class="form-control" placeholder="Date">
                                    </div>
                                </div>
                                <div class="form-group">
                                <input type="submit" value="Check Available" class="btn btn-secondary py-3 px-4">
                                </div>
			    			</form>
                            <!-- Modal -->
                            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="successModalLabel">Detail Harga</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Isi modal akan diubah oleh JavaScript -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="rentVehicleButton">Rent this vehicle</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
	  					</div>
	  					{{-- <div class="col-md-8 d-flex align-items-center">
	  						<div class="services-wrap rounded-right w-100">
	  							<h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
	  							<div class="row d-flex mb-4">
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Choose Your Pickup Location</h3>
				                </div>
					            </div>
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Select the Best Deal</h3>
					              </div>
					            </div>
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Reserve Your Rental Car</h3>
					              </div>
					            </div>
					          </div>
					        </div>
					        <p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
	  						</div>
	  					</div> --}}
	  				</div>
				</div>
  		</div>
    </section>


    <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Feeatured Vehicles</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="carousel-car owl-carousel">
                        @foreach ($vehicles as $vehicle)
    					<div class="item">
    						<div class="car-wrap rounded ftco-animate">
		    					<div class="img rounded d-flex align-items-end" style="background-image: url({{ asset($vehicle->image) }});">
		    					</div>
		    					<div class="text">
		    						<h2 class="mb-0"><a href="#">{{ $vehicle->brand }}</a></h2>
		    						<div class="d-flex mb-3">
			    						<span class="cat">{{ $vehicle->model }}</span>
			    						<p class="price ml-auto">Rp {{ $vehicle->charge }} <span>/day</span></p>
		    						</div>
		    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="{{ url('cars/'.$vehicle->id) }}" class="btn btn-secondary py-2 ml-1">Details</a></p>
		    					</div>
		    				</div>
    					</div>
                        @endforeach
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

@endsection

@push('js')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function() {
        let vehicleId;
        let startDate;
        let endDate;
        let days;
        let unitPrice;
        let totalPrice;

        $('#carbook-form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response)
                    if (response.status === 'success') {
                        vehicleId = response.vehicle;
                        startDate = response.start_date;
                        endDate = response.end_date;
                        days = response.days;
                        unitPrice = response.unit_price;
                        totalPrice = response.total;
                        let modalBody = `
                            <p>Start Date: ${response.start_date}</p>
                            <p>End Date: ${response.end_date}</p>
                            <p>Rent Days: ${response.days}</p>
                            <p>Unit Price: ${response.unit_price}</p>
                            <p>Total Price: ${response.total}</p>
                        `;
                        $('#successModal .modal-body').html(modalBody);
                        $('#successModal').modal('show');
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat memproses permintaan Anda.');
                }
            });
        });

        $('#rentVehicleButton').on('click', function() {
            $.ajax({
                url: '{{ route('carbook.store') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    vehicle_id: vehicleId,
                    days: days,
                    start_rent: startDate,
                    end_rent: endDate,
                    unit_price: unitPrice,
                    total_price: totalPrice
                },
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Booking berhasil dibuat!');
                        $('#successModal').modal('hide');
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat membuat booking.');
                }
            });
        });
    });
</script>

@endpush
