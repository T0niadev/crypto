@extends('admin.layouts.app')


@section('content')
  <!-- BEGIN: Content-->
  <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h2 class="content-header-title float-start mb-0">Users</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">All Users</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-end col-md-4 col-12 d-md-block d-none">
            <form action="{{ route('admin.searchusers') }}" method="POST" role="search">
                @csrf
                    <div class="input-group rounded">
                    <input type="search" name="name" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </span>
                    </div>
               </form>
        </div>
      </div>

      <div class="content-body">
        <!-- Basic table -->
        <section id="">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <table class="display table table-stripped table-hover">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>

                      <th>Registration Date</th>
                      <th>Wallet Balance</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  @if (count($users)< 1)
                  <tbody>
                    <tr>
                        <td colspan="8" class="text-center">No Records Found</td>
                    </tr>
                  </tbody>
                  @endif
                  @foreach ($users as $user)
                    <tbody>
                      <tr>
                        <td>{{ $user['first_name'] }}</td>
                        <td>
                          {{ $user['last_name'] }}
                        </td>
                        <td>
                          {{ $user['email'] }}
                        </td>

                        <td>
                          {{ $user['created_at'] }}
                        </td>
                        <td>
                          ${{ $user['wallet'] }}
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle hide-arrow"
                              data-bs-toggle="dropdown">
                              Actions
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="{{ url('/admin/wallet/edit', $user->id) }}">
                                <i class="fa-solid fa-pen-to-square" class=""></i>
                                <span class="ps-1">Edit user wallet balance</span>
                              </a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  @endforeach
                </table>
              </div>
            </div>
          </div>


      </div>
    </div>
  </div>
  <!-- END: Content-->
@endsection

@section('pageScript')
  <script>
    $(function() {
      'use strict';
      var e = $('.datatables-basic'),
        t = $('.dt-date'),
        a = $('.dt-complex-header'),
        s = $('.dt-row-grouping'),
        l = $('.dt-multilingual'),
        o = '../../../app-assets/';
      if (
        ('laravel' === $('body').attr('data-framework') && (o = $('body').attr('data-asset-path')),
          e.length)
      ) {
        var n = e.DataTable({
          ajax: o + 'data/table-datatable.json',
          columns: [{
              data: 'responsive_id'
            },
            {
              data: 'id'
            },
            {
              data: 'id'
            },
            {
              data: 'full_name'
            },
            {
              data: 'email'
            },
            {
              data: 'username'
            },
            {
              data: 'phone'
            },
            {
              data: 'email_verified_at'
            },
            {
              data: 'created_at'
            },
            {
              data: ''
            },
            {
              data: ''
            },
          ],
          columnDefs: [{
              className: 'control',
              orderable: !1,
              responsivePriority: 2,
              targets: 0
            },
            {
              targets: 1,
              orderable: !1,
              responsivePriority: 3,
              render: function(e, t, a, s) {
                return (
                  '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
                  e +
                  '" /><label class="form-check-label" for="checkbox' +
                  e +
                  '"></label></div>'
                );
              },
              checkboxes: {
                selectAllRender: '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>',
              },
            },
            {
              targets: 2,
              visible: !1
            },
            {
              targets: 3,
              responsivePriority: 4,
              render: function(e, t, a, s) {
                var l = a.avatar,
                  n = a.full_name,
                  r = a.post;
                if (l)
                  var d =
                    '<img src="' + o + 'images/avatars/' + l + '" alt="Avatar" width="32" height="32">';
                else {
                  var i = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'][
                      a.status
                    ],
                    c = (n = a.full_name).match(/\b\w/g) || [];
                  d =
                    '<span class="avatar-content">' +
                    (c = ((c.shift() || '') + (c.pop() || '')).toUpperCase()) +
                    '</span>';
                }
                return (
                  '<div class="d-flex justify-content-left align-items-center"><div class="avatar ' +
                  ('' === l ? ' bg-light-' + i + ' ' : '') +
                  ' me-1">' +
                  d +
                  '</div><div class="d-flex flex-column"><span class="emp_name text-truncate fw-bold">' +
                  n +
                  '</span><small class="emp_post text-truncate text-muted">' +
                  r +
                  '</small></div></div>'
                );
              },
            },
            {
              responsivePriority: 1,
              targets: 4
            },
            {
              targets: -2,
              render: function(e, t, a, s) {
                var l = a.status,
                  o = {
                    1: {
                      title: 'Current',
                      class: 'badge-light-primary'
                    },
                    2: {
                      title: 'Professional',
                      class: ' badge-light-success'
                    },
                    3: {
                      title: 'Rejected',
                      class: ' badge-light-danger'
                    },
                    4: {
                      title: 'Resigned',
                      class: ' badge-light-warning'
                    },
                    5: {
                      title: 'Applied',
                      class: ' badge-light-info'
                    },
                  };
                return void 0 === o[l] ?
                  e :
                  '<span class="badge rounded-pill ' + o[l].class + '">' + o[l].title + '</span>';
              },
            },
            {
              targets: -1,
              title: 'Actions',
              orderable: !1,
              render: function(e, t, a, s) {
                return (
                  '<div class="d-inline-flex"><a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                  feather.icons['more-vertical'].toSvg({
                    class: 'font-small-4'
                  }) +
                  '</a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">' +
                  feather.icons['file-text'].toSvg({
                    class: 'font-small-4 me-50'
                  }) +
                  'Details</a><a href="javascript:;" class="dropdown-item">' +
                  feather.icons.archive.toSvg({
                    class: 'font-small-4 me-50'
                  }) +
                  'Archive</a><a href="javascript:;" class="dropdown-item delete-record">' +
                  feather.icons['trash-2'].toSvg({
                    class: 'font-small-4 me-50'
                  }) +
                  'Delete</a></div></div><a href="javascript:;" class="item-edit">' +
                  feather.icons.edit.toSvg({
                    class: 'font-small-4'
                  }) +
                  '</a>'
                );
              },
            },
          ],
          order: [
            [2, 'desc']
          ],
          dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
          displayLength: 7,
          lengthMenu: [7, 10, 25, 50, 75, 100],
          buttons: [{
              extend: 'collection',
              className: 'btn btn-outline-secondary dropdown-toggle me-2',
              text: feather.icons.share.toSvg({
                class: 'font-small-4 me-50'
              }) + 'Export',
              buttons: [{
                  extend: 'csv',
                  text: feather.icons['file-text'].toSvg({
                    class: 'font-small-4 me-50'
                  }) + 'Csv',
                  className: 'dropdown-item',
                  exportOptions: {
                    columns: [3, 4, 5, 6, 7]
                  },
                },
                {
                  extend: 'excel',
                  text: feather.icons.file.toSvg({
                    class: 'font-small-4 me-50'
                  }) + 'Excel',
                  className: 'dropdown-item',
                  exportOptions: {
                    columns: [3, 4, 5, 6, 7]
                  },
                },
                {
                  extend: 'pdf',
                  text: feather.icons.clipboard.toSvg({
                    class: 'font-small-4 me-50'
                  }) + 'Pdf',
                  className: 'dropdown-item',
                  exportOptions: {
                    columns: [3, 4, 5, 6, 7]
                  },
                },
                {
                  extend: 'copy',
                  text: feather.icons.copy.toSvg({
                    class: 'font-small-4 me-50'
                  }) + 'Copy',
                  className: 'dropdown-item',
                  exportOptions: {
                    columns: [3, 4, 5, 6, 7]
                  },
                },
              ],
              init: function(e, t, a) {
                $(t).removeClass('btn-secondary'),
                  $(t).parent().removeClass('btn-group'),
                  setTimeout(function() {
                    $(t).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                  }, 50);
              },
            },
            {
              text: feather.icons.plus.toSvg({
                class: 'me-50 font-small-4'
              }) + 'Add New Record',
              className: 'create-new btn btn-primary',
              attr: {
                'data-bs-toggle': 'modal',
                'data-bs-target': '#modals-slide-in'
              },
              init: function(e, t, a) {
                $(t).removeClass('btn-secondary');
              },
            },
          ],
          responsive: {
            details: {
              display: $.fn.dataTable.Responsive.display.modal({
                header: function(e) {
                  return 'Details of ' + e.data().full_name;
                },
              }),
              type: 'column',
              renderer: function(e, t, a) {
                var s = $.map(a, function(e, t) {
                  return '' !== e.title ?
                    '<tr data-dt-row="' +
                    e.rowIdx +
                    '" data-dt-column="' +
                    e.columnIndex +
                    '"><td>' +
                    e.title +
                    ':</td> <td>' +
                    e.data +
                    '</td></tr>' :
                    '';
                }).join('');
                return !!s && $('<table class="table"/>').append('<tbody>' + s + '</tbody>');
              },
            },
          },
          language: {
            paginate: {
              previous: '&nbsp;',
              next: '&nbsp;'
            }
          },
        });
      }
      t.length && t.flatpickr({
        monthSelectorType: 'static',
        dateFormat: 'm/d/Y'
      });
      var r = 101;
      if (
        ($('.data-submit').on('click', function() {
            var e = $('.add-new-record .dt-full-name').val(),
              t = $('.add-new-record .dt-post').val(),
              a = $('.add-new-record .dt-email').val(),
              s = $('.add-new-record .dt-date').val(),
              l = $('.add-new-record .dt-salary').val();
            '' != e &&
              (n.row
                .add({
                  responsive_id: null,
                  id: r,
                  full_name: e,
                  post: t,
                  email: a,
                  start_date: s,
                  salary: '$' + l,
                  status: 5,
                })
                .draw(),
                r++,
                $('.modal').modal('hide'));
          }),
          $('.datatables-basic tbody').on('click', '.delete-record', function() {
            n.row($(this).parents('tr')).remove().draw();
          }),
          a.length)
      )
        a.DataTable({
          ajax: o + 'data/table-datatable.json',
          columns: [{
              data: 'full_name'
            },
            {
              data: 'email'
            },
            {
              data: 'city'
            },
            {
              data: 'post'
            },
            {
              data: 'salary'
            },
            {
              data: 'status'
            },
            {
              data: ''
            },
          ],
          columnDefs: [{
              targets: -2,
              render: function(e, t, a, s) {
                var l = a.status,
                  o = {
                    1: {
                      title: 'Current',
                      class: 'badge-light-primary'
                    },
                    2: {
                      title: 'Professional',
                      class: ' badge-light-success'
                    },
                    3: {
                      title: 'Rejected',
                      class: ' badge-light-danger'
                    },
                    4: {
                      title: 'Resigned',
                      class: ' badge-light-warning'
                    },
                    5: {
                      title: 'Applied',
                      class: ' badge-light-info'
                    },
                  };
                return void 0 === o[l] ?
                  e :
                  '<span class="badge rounded-pill ' + o[l].class + '">' + o[l].title + '</span>';
              },
            },
            {
              targets: -1,
              title: 'Actions',
              orderable: !1,
              render: function(e, t, a, s) {
                return (
                  '<div class="d-inline-flex"><a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                  feather.icons['more-vertical'].toSvg({
                    class: 'font-small-4'
                  }) +
                  '</a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">' +
                  feather.icons['file-text'].toSvg({
                    class: 'me-50 font-small-4'
                  }) +
                  'Details</a><a href="javascript:;" class="dropdown-item">' +
                  feather.icons.archive.toSvg({
                    class: 'me-50 font-small-4'
                  }) +
                  'Archive</a><a href="javascript:;" class="dropdown-item delete-record">' +
                  feather.icons['trash-2'].toSvg({
                    class: 'me-50 font-small-4'
                  }) +
                  'Delete</a></div></div><a href="javascript:;" class="item-edit">' +
                  feather.icons.edit.toSvg({
                    class: 'font-small-4'
                  }) +
                  '</a>'
                );
              },
            },
          ],
          dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
          displayLength: 7,
          lengthMenu: [7, 10, 25, 50, 75, 100],
          language: {
            paginate: {
              previous: '&nbsp;',
              next: '&nbsp;'
            }
          },
        });
      if (s.length) {
        var d = s.DataTable({
          ajax: o + 'data/table-datatable.json',
          columns: [{
              data: 'responsive_id'
            },
            {
              data: 'full_name'
            },
            {
              data: 'post'
            },
            {
              data: 'email'
            },
            {
              data: 'city'
            },
            {
              data: 'start_date'
            },
            {
              data: 'salary'
            },
            {
              data: 'status'
            },
            {
              data: ''
            },
          ],
          columnDefs: [{
              className: 'control',
              orderable: !1,
              targets: 0
            },
            {
              visible: !1,
              targets: 2
            },
            {
              targets: -2,
              render: function(e, t, a, s) {
                var l = a.status,
                  o = {
                    1: {
                      title: 'Current',
                      class: 'badge-light-primary'
                    },
                    2: {
                      title: 'Professional',
                      class: ' badge-light-success'
                    },
                    3: {
                      title: 'Rejected',
                      class: ' badge-light-danger'
                    },
                    4: {
                      title: 'Resigned',
                      class: ' badge-light-warning'
                    },
                    5: {
                      title: 'Applied',
                      class: ' badge-light-info'
                    },
                  };
                return void 0 === o[l] ?
                  e :
                  '<span class="badge rounded-pill ' + o[l].class + '">' + o[l].title + '</span>';
              },
            },
            {
              targets: -1,
              title: 'Actions',
              orderable: !1,
              render: function(e, t, a, s) {
                return (
                  '<div class="d-inline-flex"><a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                  feather.icons['more-vertical'].toSvg({
                    class: 'font-small-4'
                  }) +
                  '</a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">' +
                  feather.icons['file-text'].toSvg({
                    class: 'me-50 font-small-4'
                  }) +
                  'Details</a><a href="javascript:;" class="dropdown-item">' +
                  feather.icons.archive.toSvg({
                    class: 'me-50 font-small-4'
                  }) +
                  'Archive</a><a href="javascript:;" class="dropdown-item delete-record">' +
                  feather.icons['trash-2'].toSvg({
                    class: 'me-50 font-small-4'
                  }) +
                  'Delete</a></div></div><a href="javascript:;" class="item-edit">' +
                  feather.icons.edit.toSvg({
                    class: 'font-small-4'
                  }) +
                  '</a>'
                );
              },
            },
          ],
          order: [
            [2, 'asc']
          ],
          dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
          displayLength: 7,
          lengthMenu: [7, 10, 25, 50, 75, 100],
          drawCallback: function(e) {
            var t = this.api(),
              a = t.rows({
                page: 'current'
              }).nodes(),
              s = null;
            t.column(2, {
                page: 'current'
              })
              .data()
              .each(function(e, t) {
                s !== e &&
                  ($(a)
                    .eq(t)
                    .before('<tr class="group"><td colspan="8">' + e + '</td></tr>'),
                    (s = e));
              });
          },
          responsive: {
            details: {
              display: $.fn.dataTable.Responsive.display.modal({
                header: function(e) {
                  return 'Details of ' + e.data().full_name;
                },
              }),
              type: 'column',
              renderer: function(e, t, a) {
                var s = $.map(a, function(e, t) {
                  return '' !== e.title ?
                    '<tr data-dt-row="' +
                    e.rowIdx +
                    '" data-dt-column="' +
                    e.columnIndex +
                    '"><td>' +
                    e.title +
                    ':</td> <td>' +
                    e.data +
                    '</td></tr>' :
                    '';
                }).join('');
                return !!s && $('<table class="table"/>').append('<tbody>' + s + '</tbody>');
              },
            },
          },
          language: {
            paginate: {
              previous: '&nbsp;',
              next: '&nbsp;'
            }
          },
        });
        $('.dt-row-grouping tbody').on('click', 'tr.group', function() {
          var e = table.order()[0];
          2 === e[0] && 'asc' === e[1] ? d.order([2, 'desc']).draw() : d.order([2, 'asc']).draw();
        });
      }
      if (l.length)
        l.DataTable({
          ajax: o + 'data/table-datatable.json',
          columns: [{
              data: 'responsive_id'
            },
            {
              data: 'full_name'
            },
            {
              data: 'post'
            },
            {
              data: 'email'
            },
            {
              data: 'start_date'
            },
            {
              data: 'salary'
            },
            {
              data: 'status'
            },
            {
              data: ''
            },
          ],
          columnDefs: [{
              className: 'control',
              orderable: !1,
              targets: 0
            },
            {
              targets: -2,
              render: function(e, t, a, s) {
                var l = a.status,
                  o = {
                    1: {
                      title: 'Current',
                      class: 'badge-light-primary'
                    },
                    2: {
                      title: 'Professional',
                      class: ' badge-light-success'
                    },
                    3: {
                      title: 'Rejected',
                      class: ' badge-light-danger'
                    },
                    4: {
                      title: 'Resigned',
                      class: ' badge-light-warning'
                    },
                    5: {
                      title: 'Applied',
                      class: ' badge-light-info'
                    },
                  };
                return void 0 === o[l] ?
                  e :
                  '<span class="badge rounded-pill ' + o[l].class + '">' + o[l].title + '</span>';
              },
            },
            {
              targets: -1,
              title: 'Actions',
              orderable: !1,
              render: function(e, t, a, s) {
                return (
                  '<div class="d-inline-flex"><a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                  feather.icons['more-vertical'].toSvg({
                    class: 'font-small-4'
                  }) +
                  '</a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">' +
                  feather.icons['file-text'].toSvg({
                    class: 'me-50 font-small-4'
                  }) +
                  'Details</a><a href="javascript:;" class="dropdown-item">' +
                  feather.icons.archive.toSvg({
                    class: 'me-50 font-small-4'
                  }) +
                  'Archive</a><a href="javascript:;" class="dropdown-item delete-record">' +
                  feather.icons['trash-2'].toSvg({
                    class: 'me-50 font-small-4'
                  }) +
                  'Delete</a></div></div><a href="javascript:;" class="item-edit">' +
                  feather.icons.edit.toSvg({
                    class: 'font-small-4'
                  }) +
                  '</a>'
                );
              },
            },
          ],
          language: {
            url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json',
            paginate: {
              previous: '&nbsp;',
              next: '&nbsp;'
            },
          },
          dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
          displayLength: 7,
          lengthMenu: [7, 10, 25, 50, 75, 100],
          responsive: {
            details: {
              display: $.fn.dataTable.Responsive.display.modal({
                header: function(e) {
                  return 'Details of ' + e.data().full_name;
                },
              }),
              type: 'column',
              renderer: function(e, t, a) {
                var s = $.map(a, function(e, t) {
                  return '' !== e.title ?
                    '<tr data-dt-row="' +
                    e.rowIdx +
                    '" data-dt-column="' +
                    e.columnIndex +
                    '"><td>' +
                    e.title +
                    ':</td> <td>' +
                    e.data +
                    '</td></tr>' :
                    '';
                }).join('');
                return !!s && $('<table class="table"/>').append('<tbody>' + s + '</tbody>');
              },
            },
          },
        });
    });
  </script>
@endsection
