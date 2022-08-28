@extends('admin.layouts.app')


@section('content')


    <div class="container">
            <div class="page-inner mt--5">
                <div id="prnt"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card_header_bg_blue" >
                                <div class="card-head-row card-tools-still-right">
                                    <h4 class="card-title text-white" > {{ __('All Users') }} </h4>
                                    <div class="card-tools">
                                       <form action="/admin/search/user" method="post">
                                            <div class="input-group">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> {{ __('Search') }} </span>
                                                </div>
                                                <input type="text" name="search_val" class="form-control" placeholder="Search by Name, Username, email, phone and status">
                                                <div class="input-group-append" style="padding: 0px;">
                                                    <button class="fa fa-search btn"></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <p class="card-category text-white" > {{ __('All registered users.') }} </p>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="" class="table  table-hover" >
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-eye"></i></th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Username') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Phone') }}</th>
                                                <th>{{ __('Status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                                @foreach($users as $user)
                                                    <tr>
                                                        <td>
                                                            <a class="btn btn-info" href="/users/edit/{{$user->id}}" title="View user details">
                                                                <i class="fa fa-eye"> VIEW</i>
                                                            </a>
                                                        </td>
                                                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                                                        <td>{{$user->username}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>{{$user->phone}}</td>
                                                        <td>
                                                            @if($user->status == 1 || $user->status == 'Active')
                                                                {{'Active'}}
                                                             @elseif($user->status == 0 || $user->status == 'Not Active')
                                                             {{'Not Active'}}
                                                             @else
                                                             {{'Blocked'}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach



                                        </tbody>
                                    </table>
                                    <div class="" align="">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
