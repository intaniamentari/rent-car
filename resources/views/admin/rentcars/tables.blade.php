@extends('admin.layouts.main')

@section('content')

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold mx-4 py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Rent Car</h4>

              <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 text-end">
                        <button type="button"
                        class="btn btn-success mx-3"
                        data-bs-toggle="modal"
                        data-bs-target="#modalCenter">Create Rent Car</button>

                        <!-- Modal Create -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="modalCenterTitle">Create Rentcar</h5>
                                  <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                  ></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('rentcar-info.store') }}" method="POST">
                                        @csrf
                                        @method('post')
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="basic-default-fullname">Customer</label>
                                          <select class="form-select" id="customer" name="customer_id" id="exampleFormControlSelect1" aria-label="Default select example">
                                              <option value="">...</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12  text-start" for="basic-default-fullname">Vehicle</label>
                                            <select class="form-select" id="vehicle" name="vehicle_id" id="exampleFormControlSelect1" aria-label="Default select example">
                                                <option value="">...</option>
                                                @foreach ($vehicles as $vehicle)
                                                    <option value="{{ $vehicle->id }}">{{ $vehicle->brand }} - {{ $vehicle->model }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="basic-default-fullname">Start Rent</label>
                                          <input type="date" id="start_rent" name="start_rent" class="form-control" id="basic-default-fullname" required />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="basic-default-fullname">End Rent</label>
                                          <input type="date" id="end_rent" name="end_rent" class="form-control" id="basic-default-fullname" required />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="basic-default-fullname">Unit Price</label>
                                          <input type="text" id="unit_price" name="unit_price" class="form-control" id="basic-default-fullname" readonly style="background-color: #ACB5C0" />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="basic-default-fullname">Total Price</label>
                                          <input type="number" id="total_price" name="total_price" class="form-control" id="basic-default-fullname" readonly style="background-color: #ACB5C0" />
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-success">Create</button>
                                        </div>
                                    </form>
                              </div>
                            </div>
                        </div>

                        {{-- Modal Edit --}}
                        <div class="modal fade" id="modalEditRentcar" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditREntcarTitle">Edit Vehicle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editRentcarForm" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-customer">Customer</label>
                                                <select class="form-select" id="edit-customer" name="customer_id" id="exampleFormControlSelect1" aria-label="Default select example">
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-vehicle">Model</label>
                                                <select class="form-select" id="edit-vehicle" name="vehicle_id" id="exampleFormControlSelect1" aria-label="Default select example">
                                                    @foreach ($vehicles as $vehicle)
                                                        <option value="{{ $vehicle->id }}">{{ $vehicle->brand }} - {{ $vehicle->model }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-start_rent">Start Rent</label>
                                                <input type="date" name="start_rent" class="form-control" id="edit-start_rent" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-end_rent">End Rent</label>
                                                <input type="date" name="end_rent" class="form-control" id="edit-end_rent" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-unit_price">Unit Price</label>
                                                <input type="text" name="unit_price" class="form-control" id="edit-unit_price" readonly style="background-color: #ACB5C0" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-total_price">Total Price</label>
                                                <input type="text" name="total_price" class="form-control" id="edit-total_price" readonly style="background-color: #ACB5C0" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-status">Status</label>
                                                <select class="form-select" id="edit-status" name="status" id="exampleFormControlSelect1" aria-label="Default select example">
                                                    <option value="booking">Booking</option>
                                                    <option value="used">Used</option>
                                                    <option value="finish">Finish</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              <!-- Hoverable Table rows -->
              {{-- <div class="card"> --}}
                {{-- <h5 class="card-header">Hoverable rows</h5> --}}
                {{-- <div class="table-responsive text-nowrap"> --}}
                  <table class="table table-hover" id="table_rentcars">
                    <thead>
                      <tr>
                        <th>Customer</th>
                        <th>Vehicle</th>
                        <th>Start Rent</th>
                        <th>End Rent</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    </tbody>
                  </table>
                {{-- </div> --}}
              {{-- </div> --}}
              <!--/ Hoverable Table rows -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('datatable/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap5.css') }}" />
    <style>
        .dataTables_wrapper {
            margin: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .dataTables_length {
            margin-bottom: 10px;
        }

        .dataTables_filter input {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
        }

        .dataTables_info {
            margin-top: 10px;
        }

        .dataTables_paginate {
            margin-top: 10px;
        }

    </style>
@endpush

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
        $('#table_rentcars').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url()->current() }}',
                columns: [
                    { data: 'customer', name: 'customer' },
                    { data: 'vehicle', name: 'vehicle' },
                    { data: 'start_rent', name: 'start_rent' },
                    { data: 'end_rent', name: 'end_rent' },
                    { data: 'total_price', name: 'total_price' },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row) {
                            // Menampilkan label "Free" jika available == 1, "Use" jika available == 0
                            if(data == 'used'){
                                return '<span class="badge rounded-pill bg-label-danger">Used</span>';
                            } else if(data == 'finish'){
                                return '<span class="badge rounded-pill bg-label-success">Finish</span>';
                            } else {
                                return '<span class="badge rounded-pill bg-label-warning">Booking</span>';
                            }
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            // Tambahkan tombol edit dan delete
                            return '<button class="btn btn-primary btn-sm btn-edit" data-id="' + row.id + '">Edit</button> ' +
                                '<button class="btn btn-danger btn-sm btn-delete" data-id="' + row.id + '">Delete</button>';
                        },
                        orderable: false,
                        searchable: false
                    }
                ],
            });
        });

        $('#table_rentcars').on('click', '.btn-edit', function() {
            var id = $(this).data('id');

            // Mengambil data dari baris yang sesuai dengan ID
            var rowData = $('#table_rentcars').DataTable().row($(this).parents('tr')).data();

            // Isi form modal dengan data
            $('#edit-customer').val(rowData.customer_id);
            $('#edit-vehicle').val(rowData.vehicle_id);
            $('#edit-start_rent').val(rowData.start_rent);
            $('#edit-end_rent').val(rowData.end_rent);
            $('#edit-unit_price').val(rowData.unit_price);
            $('#edit-total_price').val(rowData.total_price);
            $('#edit-status').val(rowData.status);

            // Atur action URL dari form edit
            $('#editRentcarForm').attr('action', '/rentcar-info/' + id);

            // Tampilkan modal edit
            $('#modalEditRentcar').modal('show');
        });

        $('#table_rentcars').on('click', '.btn-delete', function() {
            var id = $(this).data('id');

            console.log(id)

            // Munculkan konfirmasi hapus
            if (confirm("Are you sure you want to delete this data?")) {
                // Menggunakan jQuery untuk mengirim permintaan DELETE
                $.ajax({
                    url: '/rentcar-info/' + id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Memasukkan token CSRF ke dalam header
                    },
                    success: function(response) {
                        console.log('Vehicle deleted successfully');
                        // Tambahkan kode untuk memperbarui tampilan setelah penghapusan berhasil
                        location.reload();
                    },
                    error: function(xhr) {
                        console.error('Error deleting vehicle:', xhr.responseText);
                        // Tambahkan kode untuk menangani kesalahan jika ada
                    }
                });
            }
        });


    </script>

    {{-- get unit price create --}}
    <script>
        $(document).ready(function() {
            // Ketika pilihan vehicle berubah
            $('#vehicle').change(function() {
                var vehicleId = $(this).val();
                console.log('🌹 ' + vehicleId)
                // Mengambil data unit price menggunakan AJAX
                $.ajax({
                    url: 'get-vehicle-unit-price/' + vehicleId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.unit_price) {
                            $('#unit_price').val(response.unit_price);
                        } else {
                            $('#unit_price').val('');
                            alert('Unit price not found for selected vehicle.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Error while fetching unit price for selected vehicle.');
                    }
                });
            });

            // Ketika pilihan tanggal sewa berubah
            $('#start_rent, #end_rent').change(function() {
                var startDate = $('#start_rent').val();
                var endDate = $('#end_rent').val();
                var unitPrice = parseFloat($('#unit_price').val());
                if (!isNaN(unitPrice) && startDate && endDate) {
                    var startRent = new Date(startDate);
                    var endRent = new Date(endDate);
                    var daysDiff = (endRent - startRent) / (1000 * 3600 * 24);
                    var totalPrice = unitPrice * daysDiff;
                    $('#total_price').val(totalPrice);
                }
            });
        });
    </script>

    {{-- get unit price edit --}}
    <script>
        $(document).ready(function() {
            // Ketika pilihan vehicle berubah
            $('#edit-vehicle').change(function() {
                var vehicleId = $(this).val();
                var startDate = $('#edit-start_rent').val();
                var endDate = $('#edit-end_rent').val();
                var unitPrice = parseFloat($('#edit-unit_price').val());

                console.log('🌹 ' + vehicleId)
                // Mengambil data unit price menggunakan AJAX
                $.ajax({
                    url: 'get-vehicle-unit-price/' + vehicleId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.unit_price) {
                            var startRent = new Date(startDate);
                            var endRent = new Date(endDate);
                            var daysDiff = (endRent - startRent) / (1000 * 3600 * 24);
                            var totalPrice = response.unit_price * daysDiff;

                            console.log(startDate)
                            console.log(endRent)
                            console.log(daysDiff)
                            console.log(totalPrice)

                            $('#edit-total_price').val(totalPrice);
                            $('#edit-unit_price').val(response.unit_price);
                        } else {
                            $('#edit-unit_price').val('');
                            alert('Unit price not found for selected vehicle.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Error while fetching unit price for selected vehicle.');
                    }
                });
            });

            // Ketika pilihan tanggal awal
            $('#edit-start_rent').change(function() {
                var startDate = $('#edit-start_rent').val();
                var endDate = $('#edit-end_rent').val();
                var unitPrice = parseFloat($('#edit-unit_price').val());
                if (!isNaN(unitPrice) && startDate && endDate) {
                    var startRent = new Date(startDate);
                    var endRent = new Date(endDate);
                    var daysDiff = (endRent - startRent) / (1000 * 3600 * 24);
                    var totalPrice = unitPrice * daysDiff;
                    $('#edit-total_price').val(totalPrice);
                }
            });

            // Ketika pilihan tanggal akhir
            $('#edit-end_rent').change(function() {
                var startDate = $('#edit-start_rent').val();
                var endDate = $('#edit-end_rent').val();
                var unitPrice = parseFloat($('#edit-unit_price').val());
                if (!isNaN(unitPrice) && startDate && endDate) {
                    var startRent = new Date(startDate);
                    var endRent = new Date(endDate);
                    var daysDiff = (endRent - startRent) / (1000 * 3600 * 24);
                    var totalPrice = unitPrice * daysDiff;
                    $('#edit-total_price').val(totalPrice);
                }
            });
        });
    </script>
    <script src="{{ asset('datatable/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
