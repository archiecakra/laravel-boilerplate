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
            <button onclick="create()" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
              Create new user
            </button>
            <button onclick="create()" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            </button>
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
          <h5 class="modal-title">Create User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form id="form">

            <div class="mb-3">
              <label class="form-label">Name</label>
              <input id="name" type="text" class="form-control" name="name" placeholder="Your Name">
              <div class="invalid-feedback">
                Error message
              </div>
            </div>

            <div class="row">
              <div class="col-lg-7">
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input id="email" type="email" class="form-control" name="email" placeholder="example@mail.com">
                  <div class="invalid-feedback">
                    Error message
                  </div>
                </div>
              </div>
              <div class="col-lg-5">
                <div class="mb-3">
                  <label class="form-label">Username</label>
                  <input id="username" type="text" class="form-control" name="username" placeholder="john.doe">
                  <div class="invalid-feedback">
                    Error message
                  </div>
                </div>
              </div>
            </div>

            <label class="form-label">User's Role</label>
            <div class="form-selectgroup-boxes row mb-3">
              <div class="col-lg-6">
                <label class="form-selectgroup-item">
                  <input type="radio" name="role" value="admin" class="form-selectgroup-input">
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
                  <input type="radio" name="role" value="user" class="form-selectgroup-input" checked>
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

            <div id="password" class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                  <div class="invalid-feedback">
                    Error message
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Password Confirmation</label>
                  <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
                  <div class="invalid-feedback">
                    Error message
                  </div>
                </div>
              </div>
            </div>

          </form>

        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
          </a>
          <button id="submit" class="btn btn-primary ms-auto">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Save
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    });

    let table = $('#datatable').DataTable({
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
            return '<span class="dropdown">'
                    +'<button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Aksi</button>'
                    +'<div class="dropdown-menu dropdown-menu-end">'
                      +'<button onclick="edit('+row.id+')" class="dropdown-item btn btn-ghost-dark w-100" data-bs-toggle="modal" data-bs-target="#modal-report">'
                        +'Edit'
                      +'</button>'
                      +'<button onclick="delete('+row.id+')" class="dropdown-item btn btn-ghost-dark w-100">'
                        +'Hapus'
                      +'</button>'
                    +'</div>'
                  +'</span>';
          },
        },
      ],
    });

    $('#modal-report').on('hidden.bs.modal', function() {
      $('.modal-title').html('Tambah User');
      $(':input', this).val('').removeClass("is-invalid");
      $('.form-selectgroup-input').prop("checked", false);
      $('.form-selectgroup-input').eq(1).prop("checked", true);
    });

    function edit(id) {

      $('.modal-title').html('Edit User');
      $('#submit').attr('onclick','update()');

      let url = '{{ route("user.edit", ":slug") }}';
      url = url.replace(':slug', id);

      $.ajax({
        type  : 'POST',
        url   : url,
        dataType  : 'json',
        data      : {"_token": "{{ csrf_token() }}", "id": id},
        success   : function (data) {
          console.log(data);
          $('#name').val(data.name);
          $('#username').val(data.username);
          $('#email').val(data.email);
          if (data.role == 'admin') {
            $('.form-selectgroup-input').eq(0).prop("checked", true);
          } else {
            $('.form-selectgroup-input').eq(1).prop("checked", true);
          }
        },
        error : function (xhr, status, error) {
          let data = JSON.parse(xhr.responseText);
          $('.overlay').hide();
          Toast.fire({
            icon: 'error',
            title: data.message,
          });
        },
      });

    }

    function update(id) {
      alert('test update');
    }

    function create() {
      $('#submit').attr('onclick','store()');
    }

    function store() {

      let formData = new FormData($('#form')[0]);
      formData.append("_token", "{{ csrf_token() }}");

      $.ajax({
        type  : 'POST',
        url   : '{{ route("user.store") }}',
        contentType: false,
        processData: false,
        data      : formData,
        success   : function (data) {
          console.log(data);
          Toast.fire({
            icon: 'success',
            title: 'User berhasil dibuat.'
          });
        },
        error : function (xhr, status, error) {
          let message = xhr.responseJSON.message;
          $("form#form :input").removeClass("is-invalid").next(".invalid-feedback").html("Error message");
          for (const key in message){
            console.log(key);
            $('input[name="'+key+'"]').addClass("is-invalid").next(".invalid-feedback").html(xhr.responseJSON.message[key]);
          }

          Toast.fire({
            icon: 'error',
            title: 'Gagal membuat user, periksa form.'
          });
        },
      });
    }
  </script>
@endsection
