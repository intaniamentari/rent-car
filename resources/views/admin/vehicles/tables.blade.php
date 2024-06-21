@extends('admin.layouts.main')

@section('content')

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold mx-4 py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Vehicles</h4>

              <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 text-end">
                        <button type="button"
                        class="btn btn-success mx-3"
                        data-bs-toggle="modal"
                        data-bs-target="#modalCenter">Create Vehicle</button>

                        <!-- Modal Create -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="modalCenterTitle">Create Vehicle</h5>
                                  <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                  ></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('vehicles.store') }}" method="POST">
                                        @csrf
                                        @method('post')
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="basic-default-fullname">Brand</label>
                                          <input type="text" name="brand" class="form-control" id="basic-default-fullname" required />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12  text-start" for="basic-default-fullname">Model</label>
                                          <input type="text" name="model" class="form-control" id="basic-default-fullname" required />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="basic-default-fullname">Vehicle Number</label>
                                          <input type="text" name="vehicle_number" class="form-control" id="basic-default-fullname" required />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="basic-default-fullname">Mileage</label>
                                          <input type="number" name="mileage" class="form-control" id="basic-default-fullname" required />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="basic-default-fullname">Transmission</label>
                                          <input type="text" name="transmission" class="form-control" id="basic-default-fullname" required />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="basic-default-fullname">Seats</label>
                                          <input type="number" name="seats" class="form-control" id="basic-default-fullname" required />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="basic-default-fullname">Lunggage</label>
                                          <input type="number" name="lunggage" class="form-control" id="basic-default-fullname" required />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="basic-default-fullname">Fuel</label>
                                          <input type="text" name="fuel" class="form-control" id="basic-default-fullname" required />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="basic-default-fullname">Charge</label>
                                          <input type="number" name="charge" class="form-control" id="basic-default-fullname" required />
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
                        <div class="modal fade" id="modalEditVehicle" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditVehicleTitle">Edit Vehicle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editVehicleForm" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-brand">Brand</label>
                                                <input type="text" name="brand" class="form-control" id="edit-brand" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-model">Model</label>
                                                <input type="text" name="model" class="form-control" id="edit-model" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-vehicle_number">Vehicle Number</label>
                                                <input type="text" name="vehicle_number" class="form-control" id="edit-vehicle_number" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-mileage">Mileage</label>
                                                <input type="text" name="mileage" class="form-control" id="edit-mileage" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-transmission">Transmission</label>
                                                <input type="text" name="transmission" class="form-control" id="edit-transmission" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-seats">Seats</label>
                                                <input type="text" name="seats" class="form-control" id="edit-seats" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-lunggage">Lunggage</label>
                                                <input type="text" name="lunggage" class="form-control" id="edit-lunggage" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-fuel">Fuel</label>
                                                <input type="text" name="fuel" class="form-control" id="edit-fuel" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-charge">Charge</label>
                                                <input type="number" name="charge" class="form-control" id="edit-charge" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-charge">Available</label>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-6 text-start">
                                                            <input class="form-check-input" type="radio" name="available" id="edit-available-free" value="1">
                                                            <label class="form-check-label" for="edit-available-free">
                                                                free
                                                            </label>
                                                        </div>
                                                        <div class="col-6 text-start">
                                                            <input class="form-check-input" type="radio" name="available" id="edit-available-used" value="0">
                                                            <label class="form-check-label" for="edit-available-used">
                                                                used
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
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
                  <table class="table table-hover" id="table_vehicles">
                    <thead>
                      <tr>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Vehicle Number</th>
                        <th>Charge</th>
                        <th>Available</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    </tbody>
                  </table>
                {{-- </div> --}}
              {{-- </div> --}}
              <!--/ Hoverable Table rows -->

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
        $('#table_vehicles').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url()->current() }}',
                columns: [
                    { data: 'brand', name: 'brand' },
                    { data: 'model', name: 'model' },
                    { data: 'vehicle_number', name: 'vehicle_number' },
                    { data: 'charge', name: 'charge' },
                    {
                        data: 'available',
                        name: 'available',
                        render: function(data, type, row) {
                            // Menampilkan label "Free" jika available == 1, "Use" jika available == 0
                            return data == 1 ? '<span class="badge rounded-pill bg-label-success">Free</span>' : '<span class="badge rounded-pill bg-label-danger">Used</span>';
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

        // Tangani klik tombol edit
        // $('#table_vehicles').on('click', '.btn-edit', function() {
        //     var id = $(this).data('id');
        //     // Lakukan sesuatu ketika tombol edit diklik, misalnya tampilkan form edit
        //     console.log('Edit button clicked for ID:', id);
        // });
        $('#table_vehicles').on('click', '.btn-edit', function() {
            var id = $(this).data('id');

            // Mengambil data dari baris yang sesuai dengan ID
            var rowData = $('#table_vehicles').DataTable().row($(this).parents('tr')).data();

            // Isi form modal dengan data
            $('#edit-brand').val(rowData.brand);
            $('#edit-model').val(rowData.model);
            $('#edit-vehicle_number').val(rowData.vehicle_number);
            $('#edit-charge').val(rowData.charge);
            $('#edit-mileage').val(rowData.mileage);
            $('#edit-transmission').val(rowData.transmission);
            $('#edit-seats').val(rowData.seats);
            $('#edit-lunggage').val(rowData.lunggage);
            $('#edit-fuel').val(rowData.fuel);

            // Atur status radio button sesuai dengan nilai available
            if (rowData.available == 1) {
                $('#edit-available-free').prop('checked', true);
            } else {
                $('#edit-available-used').prop('checked', true);
            }

            // Atur action URL dari form edit
            $('#editVehicleForm').attr('action', '/vehicles/' + id);

            // Tampilkan modal edit
            $('#modalEditVehicle').modal('show');
        });

        // Tangani klik tombol delete
        // $('#table_vehicles').on('click', '.btn-delete', function() {
        //     var id = $(this).data('id');
        //     // Lakukan sesuatu ketika tombol delete diklik, misalnya konfirmasi hapus
        //     console.log('Delete button clicked for ID:', id);
        // });
        $('#table_vehicles').on('click', '.btn-delete', function() {
            var id = $(this).data('id');

            console.log(id)

            // Munculkan konfirmasi hapus
            if (confirm("Are you sure you want to delete this vehicle?")) {
                // Menggunakan jQuery untuk mengirim permintaan DELETE
                $.ajax({
                    url: '/vehicles/' + id,
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
    <script src="{{ asset('datatable/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
