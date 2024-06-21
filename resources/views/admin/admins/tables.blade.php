@extends('admin.layouts.main')

@section('content')

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold mx-4 py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Admins</h4>

              <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 text-end">
                        <button type="button"
                        class="btn btn-success mx-3"
                        data-bs-toggle="modal"
                        data-bs-target="#modalCenter">Create Admin</button>

                        <!-- Modal Create -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="modalCenterTitle">Create Admin</h5>
                                  <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                  ></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admins.store') }}" method="POST">
                                        @csrf
                                        @method('post')
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="name">Name</label>
                                          <input type="text" name="name" class="form-control" id="name" required />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12  text-start" for="phone">Phone</label>
                                          <input type="text" name="phone" class="form-control" id="phone" required />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="address">Address</label>
                                          <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
                                          {{-- <input type="text" name="address" class="form-control" id="address" required /> --}}
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="email">Email</label>
                                          <input type="email" name="email" class="form-control" id="email" required />
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label col-12 text-start" for="password">Password</label>
                                          <input type="password" name="password" class="form-control" id="password" required />
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
                        <div class="modal fade" id="modalEditAdmin" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditAdminTitle">Edit Admin</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editAdminForm" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-name">Name</label>
                                                <input type="text" name="name" class="form-control" id="edit-name" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-phone">Phone</label>
                                                <input type="text" name="phone" class="form-control" id="edit-phone" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-address">Address</label>
                                                <input type="text" name="address" class="form-control" id="edit-address" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-email">Email</label>
                                                <input type="email" name="email" class="form-control" id="edit-email" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label col-12 text-start" for="edit-password">Password</label>
                                                <input type="password" name="password" class="form-control" id="edit-password" />
                                                <small id="passwordHelpBlock" class="form-text text-muted">
                                                    Leave blank if you don't want to change the password.
                                                </small>
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
                  <table class="table table-hover" id="table_admins">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Phone</th>
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
        $('#table_admins').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url()->current() }}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'phone', name: 'phone' },
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
        $('#table_admins').on('click', '.btn-edit', function() {
            var id = $(this).data('id');

            // Mengambil data dari baris yang sesuai dengan ID
            var rowData = $('#table_admins').DataTable().row($(this).parents('tr')).data();

            console.log(rowData)

            // Isi form modal dengan data
            $('#edit-name').val(rowData.name);
            $('#edit-phone').val(rowData.phone);
            $('#edit-address').val(rowData.address);
            $('#edit-email').val(rowData.user_email);
            $('#edit-password').val('');

            // Atur action URL dari form edit
            $('#editAdminForm').attr('action', '/admins/' + id);

            // Tampilkan modal edit
            $('#modalEditAdmin').modal('show');
        });

        // Tangani klik tombol delete
        $('#table_admins').on('click', '.btn-delete', function() {
            var id = $(this).data('id');

            console.log(id)

            // Munculkan konfirmasi hapus
            if (confirm("Are you sure you want to delete this vehicle?")) {
                // Menggunakan jQuery untuk mengirim permintaan DELETE
                $.ajax({
                    url: '/admins/' + id,
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
