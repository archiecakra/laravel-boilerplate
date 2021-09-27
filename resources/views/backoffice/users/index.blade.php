@extends('backoffice.layouts.main')

@section('title', 'Dashboard Backoffice')

@section('header')
  <div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            User Management
          </div>
          <h2 class="page-title">
            User List
          </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list">
            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
              Create new user
            </a>
            <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="col-12">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Invoices</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive-xl">
          <table id="datatable" class="table card-table table-vcenter text-nowrap datatable">
            <thead>
              <tr>
                {{-- <th class="w-1">No.</th> --}}
                <th>Name</th>
                <th>Username</th>
                <th>Role</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
@endsection

@section('js')
  <script>
    var table = $('#datatable').DataTable({
      // stateSave: true,
      processing: true,
      serverSide: true,
      ajax: {
        url: '{{ route("user.table") }}',
        contentType: "application/json",
        type: "POST",
        headers: {
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        data: function ( d ) {
          return JSON.stringify( d );
        }
      },
      columns: [
        { data: 'name', name: 'name' },
        { data: 'username', name: 'username' },
        { data: 'role', name: 'role' },
        { data: 'email', name: 'email' },
        { data: 'created_at', name: 'created_at' },
        { data: 'updated_at', name: 'updated_at' },
        { data: null },
      ],
      columnDefs: [
        {
          "targets": [0, 1, 2, 3, 4, 5],
          "className": "text-center align-middle",
        },
        {
          "targets": 6,
          "orderable": false,
          "className": "text-end",
          "render": function(data, type, row, meta) {
            var url = '{{ route("user.edit", ":slug") }}';
            url = url.replace(':slug', row.id);

            return '<span class="dropdown">'
                      +'<button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Aksi</button>'
                      +'<div class="dropdown-menu dropdown-menu-end">'
                        +'<a class="dropdown-item" href="#">'
                          +'Edit'
                        +'</a>'
                        +'<a class="dropdown-item" href="#">'
                          +'Hapus'
                        +'</a>'
                      +'</div>'
                    +'</span>';
          },
        },
      ],
    });
  </script>
@endsection
