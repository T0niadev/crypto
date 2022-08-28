@extends('admin.layouts.app')


@section('content')

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card_header_bg_blue" >
                            <div class="container">
                                <h4 class="card-title text-white"> {{ __('User Details') }} </h4>

                                <div class="card-tools">
                                    <a href="/block" >
                                        <span class=""><i class="fa fa-ban btn btn-warning" ></i></span>
                                    </a>
                                    <a href="/activate" >
                                        <span><i class="fa fa-check btn btn-success"></i></span>
                                    </a>

                                        <a href="/delete" >
                                            <span class=""><i class="fa fa-times btn btn-danger"></i></span>
                                        </a>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> {{ __('First Name') }} </label>
                                        <input id="adr" type="text" value="{{$users->first_name}}" class="form-control" name="fname" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> {{ __('Last Name') }} </label>
                                        <input id="adr" type="text" value="{{ $users->last_name }}" class="form-control" name="lname" readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> {{ __('Email Address') }} </label>
                                        <div class="input-group">
                                            <input id="email" type="email" value="{{$users->email}}" class="form-control" name="email">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> {{ __('Username') }} </label>
                                        <div class="input-group">
                                            <input id="usn" type="text" value="{{$users->username}}" class="form-control" name="usn" readonly>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <form class="" method="post" action="/admin/update/user/profile">


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> {{ __('Address') }} </label>
                                            <input id="adr" type="text" class="form-control" value="{{$users->address}}" name="adr" required>
                                        </div>
                                    </div>



                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                               <button class="collb btn btn-info"> {{ __('Save') }} </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"> {{ __('Reset User Password') }} </div>
                        </div>
                        <div class="card-body pb-0">
                            <form class="" method="post" action="/admin/change/user/pwd">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="uid" value="{{$users->id}}">
                                <div class="form-group">
                                    <label> {{ __('New Password') }} </label>
                                    <input type="password" class="form-control" name="newpwd" placeholder="New Password" required>
                                </div>
                                <div class="form-group">
                                    <label> {{ __('Confirm Password') }} </label>
                                    <input type="password" class="form-control" name="cpwd" placeholder="Confirm Password" required>
                                </div>
                                    <div class="form-group" align="left">
                                       <button class="collb btn btn-info"> {{ __('Save Password') }} </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"> {{ __('User Investment') }} </div>
                        </div>
                        <div class="card-body pb-0">
                            {{-- ('admin.temp.user_inv') --}}
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"> {{ __('Withdrawal History') }} </div>
                        </div>
                        <div class="card-body pb-0 table-responsive">
                            {{-- ('admin.temp.user_wd_history') --}}
                            <br><br>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"> {{ __('Referrals') }} </div>
                        </div>
                        <div class="card-body pb-0 table-responsive">
                           {{-- referrals --}}
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"> {{ __('Bank Accounts') }} </div>
                        </div>
                        <div class="card-body pb-0 table-responsive">
                            <table  id="" class="display table table-stripped table-hover">
                                <thead>
                                    <tr>
                                        <th> {{ __('Bank Name') }} </th>
                                        <th> {{ __('Acount Number') }} </th>
                                        <th> {{ __('Acount Name') }} </th>
                                        <th> {{ __('Actions') }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                         $mybanks = App\Models\BankAccount::where('user_id', $users->id)->get();
                                    ?>
                                    @if(count($mybanks) > 0)
                                        @foreach($mybanks as $bank)
                                            <tr>
                                                <td>{{$bank->Bank_Name}}</td>
                                                <td>{{$bank->Account_name}}</td>
                                                <td>{{$bank->Account_number}}</td>
                                                <td>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
