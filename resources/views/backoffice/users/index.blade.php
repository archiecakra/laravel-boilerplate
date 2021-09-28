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
      {{-- <div class="card-header">
        <h3 class="card-title">Invoices</h3>
      </div> --}}
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

@section('modal')
  <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
          </div>
          <div class="row">
            <div class="col-lg-7">
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="example-text-input" placeholder="example@mail.com">
              </div>
            </div>
            <div class="col-lg-5">
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="email" class="form-control" name="example-text-input" placeholder="john.doe">
              </div>
            </div>
          </div>
          <label class="form-label">User's Role</label>
          <div class="form-selectgroup-boxes row mb-3">
            <div class="col-lg-6">
              <label class="form-selectgroup-item">
                <input type="radio" name="report-type" value="admin" class="form-selectgroup-input" checked>
                <span class="form-selectgroup-label d-flex align-items-center p-3">
                  <span class="me-3">
                    <span class="form-selectgroup-check"></span>
                  </span>
                  <span class="form-selectgroup-label-content">
                    <span class="form-selectgroup-title strong mb-1">Admin</span>
                    <span class="d-block text-muted">Provide full access to this web application</span>
                  </span>
                </span>
              </label>
            </div>
            <div class="col-lg-6">
              <label class="form-selectgroup-item">
                <input type="radio" name="report-type" value="1" class="form-selectgroup-input">
                <span class="form-selectgroup-label d-flex align-items-center p-3">
                  <span class="me-3">
                    <span class="form-selectgroup-check"></span>
                  </span>
                  <span class="form-selectgroup-label-content">
                    <span class="form-selectgroup-title strong mb-1">User</span>
                    <span class="d-block text-muted">Provide limited access to this web application</span>
                  </span>
                </span>
              </label>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">Client name</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">Reporting period</label>
                <input type="date" class="form-control">
              </div>
            </div>
            <div class="col-lg-12">
              <div>
                <label class="form-label">Additional information</label>
                <textarea class="form-control" rows="3"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
          </a>
          <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Create new report
          </a>
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
                      +'<button class="dropdown-item btn btn-ghost-dark w-100" data-bs-toggle="modal" data-bs-target="#modal-report">'
                        +'Edit'
                      +'</button>'
                      +'<button class="dropdown-item btn btn-ghost-dark w-100">'
                        +'Hapus'
                      +'</button>'
                    +'</div>'
                  +'</span>';
          },
        },
      ],
    });
  </script>
@endsection
