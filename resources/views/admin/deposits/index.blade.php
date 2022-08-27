@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    
        <div class="page-inner mt--5">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card_header_bg_blue" >
                            <div class="card-head-row card-tools-still-right">
                                <h4 class="card-title text-white" > <i class="fas fa-donate"></i> {{ __('Deposit History') }} </h4>
                                <div class="card-tools">
                                    <form action="/admin/search/deposit" method="post">
                                        <div class="input-group">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> {{ __('Search:') }} </span>
                                            </div>
                                            <input type="text" name="search_val" class="form-control" placeholder="Search by Username, Amount, Bank, Date, Capital or Status">
                                            <div class="input-group-append">
                                                <button class="btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 table-responsive">
                            <table class="display table table-stripped table-hover" >
                                <thead>
                                    <tr>
                                        <th> {{ __('Actions') }} </th>
                                        <th> {{ __('Username') }} </th>
                                        <th> {{ __('Amount') }} </th>
                                        <th> {{ __('Acct Name/TXN ID') }} </th>
                                        <th> {{ __('Acct No/Wallet') }} </th>
                                        <th> {{ __('Method') }} </th>
                                        <th> {{ __('Date') }} </th>
                                        <th> {{ __('Status') }} </th>
                                    </tr>
                                </thead>
                                <tbody>


                                        @foreach($deposit as $deposit)
                                            <tr>
                                                <td>
                                                    <a title="Reject Deposit" href="/admin/reject/user/payment/{{$deposit->id}}" >
                                                        <span class=""><i class="fa fa-ban text-warning" ></i></span>
                                                    </a>
                                                    @if($adm->role == 3)
                                                        <a title="Approve Deposit" href="/admin/approve/user/payment/{{$deposit->id}}" >
                                                            <span><i class="fa fa-check text-success"></i></span>
                                                        </a>
                                                        <a title="Delete Deposit" href="/admin/delete/user/payment/{{$deposit->id}}" >
                                                            <span class=""><i class="fa fa-times text-danger"></i></span>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>{{$deposit->username}}</td>
                                                <td>{{$deposit->amount}}</td>
                                                <td>{{$deposit->accountname_ID}}</td>
                                                <td>{{$deposit->accountno_wallet}}</td>
                                                <td>{{$deposit->method}}</td>
                                                {{-- <td>{{$deposit->trans_date}}</td> --}}
                                                <td>{{substr($deposit->created_at, 0, 10)}}</td>
                                                <td>
                                                    @if($dep->status == 0)
                                                        Pending
                                                    @elseif($dep->status == 1)
                                                        Approved
                                                    @elseif($dep->status == 2)
                                                        Rejected
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
