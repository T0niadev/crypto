@extends('admin.layouts.app')
@section('content')




    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">All Withdrawals</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">All Withdrawals
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
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i
                                        class="me-1" data-feather="check-square"></i><span
                                        class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i
                                        class="me-1" data-feather="message-square"></i><span
                                        class="align-middle">Chat</span></a><a class="dropdown-item"
                                    href="app-email.html"><i class="me-1" data-feather="mail"></i><span
                                        class="align-middle">Email</span></a><a class="dropdown-item"
                                    href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span
                                        class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Small Table start -->
                <div class="row" id="table-small">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card_header_bg_blue">
                                <div class="card-head-row card-tools-still-right">
                                    <div class="card-tools">
                                        <form action="/admin/search/user" method="post">
                                            <div class="input-group">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> {{ __('Search') }}
                                                    </span>
                                                </div>
                                                <input type="text" name="search_val" class="form-control"
                                                    placeholder="Search by Name, Username, email, phone and status">
                                                <div class="input-group-append" style="padding: 0px;">
                                                    <button class="fa fa-search btn"></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <p class="card-category text-white"> {{ __('All registered users.') }} </p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th> {{ __('Username') }} </th>
                                            <th> {{ __('Amount') }} </th>
                                            <th> {{ __('Amount Payable') }} </th>
                                            <th> {{ __('Account Name/ID') }} </th>
                                            <th> {{ __('Bank Details/Wallet') }} </th>
                                            <th> {{ __('Date') }} </th>
                                            <th> {{ __('Status') }} </th>
                                            <th> {{ __('Actions') }} </th>
                                        </tr>
                                    </thead>

                                    @foreach($withdrawals as $withdrawal)
                                    <tbody>
                                        <tr>
                                            <td>{{$withdrawal->username}}</td>
                                            <td>{{$withdrawal->amount}}</td>
                                            <td><b>{{$withdrawal->amountpayable}}</b></td>
                                            <td>{{$deposit->accountname_ID}}</td>
                                            <td>{{$withdrawal->bankdetails_wallet}}</td>
                                            <td>{{substr($withdrawal->created_at, 0, 10)}}</td>
                                            <td>{{$withdrawal->status}}</td>
                                            <td>
                                                @if($user['status'] == 'open')
                                                <span class="badge rounded-pill badge-light-success me-1">Open</span>
                                                @else
                                                <span class="badge rounded-pill badge-light-danger me-1">Close</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                        data-bs-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">
                                                            <i data-feather="edit-2" class="me-50"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i data-feather="edit-2" class="me-50"></i>
                                                            <span>Show</span>
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i data-feather="trash" class="me-50"></i>
                                                            <span>Delete</span>
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
    </div>

@endsection
