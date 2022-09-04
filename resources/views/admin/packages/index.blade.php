@extends('admin.layouts.app')

@section('content')
  <!-- BEGIN: Content-->
  <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h2 class="content-header-title float-start mb-0">Bootstrap Tables</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Table Bootstrap
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
          <div class="mb-1 breadcrumb-right">
            <div class="dropdown">
              <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1"
                    data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item"
                  href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span
                    class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1"
                    data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item"
                  href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span
                    class="align-middle">Calendar</span></a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Basic Tables start -->
        <div class="row" id="basic-table">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Table Basic</h4>
              </div>
              <div class="card-body">
                <p class="card-text">
                  Using the most basic table Leanne Grahamup, here’s how <code>.table</code>-based tables
                  look in Bootstrap. You
                  can use any example of below table for your table and it can be use with any type of
                  bootstrap tables.
                </p>
              </div>
              <div class="table-responsive">
                <table class="table" id="datatable">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Name</th>
                      <th>ROI</th>
                      <th>Minimum Amount</th>
                      <th>Maximum Amount</th>
                      <th>State Date</th>
                      <th>End Date</th>
                      <th>Duration</th>
                      <th>Duration Mode</th>
                      <th>Rollover</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Basic Tables end -->



      </div>
    </div>
  </div>
  <!-- END: Content-->
@endsection

@section('pageScript')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.fetchPackages') }}",
        columns: [{
            data: 'id',
            name: 'id'
          },
          {
            data: 'name',
            name: 'name'
          },
          {
            data: 'roi',
            name: 'roi'
          },
          {
            data: 'min_amount',
            name: 'min_amount'
          },
          {
            data: 'max_amount',
            name: 'max_amount'
          },
          {
            data: 'start_date',
            name: 'start_date'
          },
          {
            data: 'end_date',
            name: 'end_date'
          },
          {
            data: 'duration',
            name: 'duration'
          },
          {
            data: 'duration_mode',
            name: 'duration_mode'
          },
          {
            data: 'rollover',
            name: 'rollover'
          },
          {
            data: 'status',
            name: 'status'
          },
          {
            data: 'action',
            name: 'action',
            orderable: false
          },
        ],
        order: [
          [0, 'desc']
        ]
      });

      $('body').on('click', '.delete', function() {
        let id = $(this).data('id');
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: !0,
          confirmButtonText: "Yes, delete it!",
          customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: "btn btn-outline-danger ms-1",
          },
          buttonsStyling: !1,
        }).then(function(t, id) {
          t.value ?
            $.ajax({
              type: "POST",
              url: "{{ url('admin.package.destroy') }}",
              data: {
                id: id
              },
              dataType: 'json',
              success: function(res) {
                var oTable = $('#datatable').dataTable();
                oTable.fnDraw(false);
                Swal.fire({
                  icon: "success",
                  title: "Deleted!",
                  text: "Your file has been deleted.",
                  customClass: {
                    confirmButton: "btn btn-success"
                  },
                });
              }
            }) :
            t.dismiss === Swal.DismissReason.cancel &&
            Swal.fire({
              title: "Cancelled",
              text: "Your imaginary file is safe :)",
              icon: "error",
              customClass: {
                confirmButton: "btn btn-success"
              },
            });
        });

      });
    });
  </script>
@endsection
