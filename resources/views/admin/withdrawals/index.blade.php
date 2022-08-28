@extends('admin.layouts.app')
@section('content')
<div class="main-panel">

        <div class="page-inner mt--5">

            <div id="prnt"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card_header_bg_blue" >
                            <div class="card-head-row card-tools-still-right">
                                <h4 class="card-title text-white"> <i class="fas fa-arrow-alt-circle-down"></i> {{ __('User Withdrawal') }} </h4>
                                <div class="card-tools">
                                    <form action="/admin/search/Withdrawal" method="post">
                                        <div class="input-group">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> {{ __('Search:') }} </span>
                                            </div>
                                            <input type="text" name="search_val" class="form-control" placeholder="Search by username, amount, bank details, date or status">
                                            <div class="input-group-append">
                                                <button class="btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 table-responsive">
                            <table class="display table table-stripped table-hover">
                                <thead>
                                    <tr>
                                        <th> {{ __('Actions') }} </th>
                                        <th> {{ __('Username') }} </th>
                                        <th> {{ __('Amount') }} </th>
                                        <th> {{ __('Amount Payable') }} </th>
                                        <th> {{ __('Bank Details/Wallet') }} </th>
                                        <th> {{ __('Date') }} </th>
                                        <th> {{ __('Status') }} </th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach($withdrawal as $withdrawal)
                                            <tr>
                                                <td>
                                                    <a title="Reject" href="/admin/reject/user/wd/{{$withdrawal->id}}" >
                                                        <span class=""><i class="fa fa-ban text-warning" ></i></span>
                                                    </a>
                                                    @if($adm->role == 3)
                                                        <a title="Approve" href="/admin/approve/user/wd/{{$withdrawal->id}}" >
                                                            <span><i class="fa fa-check text-success"></i></span>
                                                        </a>
                                                        <a title="Delete" href="/admin/delete/user/wd/{{$withdrawal->id}}" >
                                                            <span class=""><i class="fa fa-times text-danger"></i></span>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>{{$withdrawal->username}}</td>
                                                <td>{{$withdrawal->amount}}</td>
                                                <td><b>{{$withdrawal->amountpayable}}</b></td>
                                                <td>{{$withdrawal->bankdetails_wallet}}</td>
                                                <td>{{substr($withdrawal->created_at, 0, 10)}}</td>
                                                <td>{{$withdrawal->status}}</td>
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>

                        <br><br>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
