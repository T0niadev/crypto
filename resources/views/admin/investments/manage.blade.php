@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card_header_bg_blue" >
                <div class="card-head-row card-tools-still-right">
                    <h4 class="card-title text-white" > <i class="fas fa-hand-holding-usd"></i> {{ __('Manage Investments') }} </h4>
                    <div class="card-tools">
                        <form action="/admin/search/investment" method="post">
                            <div class="input-group">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> {{ __('Search:') }} </span>
                                </div>
                                <input type="text" name="search_val" class="form-control" placeholder="Search by username, date, capital, or status">
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
                            <th> {{ __('Action') }} </th>
                            <th> {{ __('Username') }} </th>
                            <th> {{ __('Package') }} </th>
                            <th> {{ __('Capital') }} </th>
                            <th> {{ __('Return') }} </th>
                            <th> {{ __('Date Invested') }} </th>
                            <th> {{ __('Elapse') }} </th>
                            <th> {{ __('Days Spent') }} </th>
                            <th> {{ __('Withdrawn') }} </th>
                            <th> {{ __('Status') }} </th>
                            <th> {{ __('Earning') }} </th>
                        </tr>
                    </thead>
                    <tbody class="web-table">
                        @if(count($actInv) > 0 )
                            @foreach($actInv as $in)
                                <?php

                                    $totalElapse = getDays(date('y-m-d'), $in->end_date);
                                    if($totalElapse == 0)
                                    {
                                        $lastWD = $in->last_wd;
                                        $enddate = ($in->end_date);
                                        $Edays = getDays($lastWD, $enddate);
                                        $ern  = intval($Edays)*floatval($in->interest)*intval($in->capital);
                                        $withdrawable = $ern;

                                        $totalDays = getDays($in->date_invested, $in->end_date);
                                        $ended = "yes";

                                    }
                                    else
                                    {
                                        $lastWD = $in->last_wd;
                                        $enddate = (date('Y-m-d'));
                                        $Edays = getDays($lastWD, $enddate);
                                        $ern  = intval($Edays)*floatval($in->interest)*intval($in->capital);
                                        $withdrawable = 0;
                                        if ($Edays >= $in->days_interval)
                                        {
                                            $withdrawable = intval($in->days_interval)*intval($in->interest)*intval($in->capital);
                                        }

                                        $totalDays = getDays($in->date_invested, date('Y-m-d'));
                                        $ended = "no";
                                    }

                                ?>
                                <tr class="">
                                    <td>
                                        <a title="Pause Investment" href="/admin/pause/user_inv/{{$in->id}}" >
                                            <span class=""><i class="fa fa-pause text-warning" ></i></span>
                                        </a>
                                        @if($adm->role == 3)
                                            <a title="Activate Investment" href="/admin/activate/user_inv/{{$in->id}}" >
                                                <span><i class="fa fa-check text-success"></i></span>
                                            </a>
                                            <a title="Delete Investment" href="/admin/delete/user_inv/{{$in->id}}" >
                                                <span class=""><i class="fa fa-times text-danger"></i></span>
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{$in->usn}}</td>
                                    <td>{{$in->package}}</td>
                                    <td>{{$in->currency}}{{$in->capital}}</td>
                                    <td>{{$in->currency}}{{round ($in->i_return, 2)}}</td>
                                    <td>{{$in->date_invested}}</td>
                                    <td>{{$in->end_date}}</td>
                                    <td>
                                        @if($in->status != 'Expired')
                                            {{$totalDays}}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>{{$in->w_amt}}</td>
                                    <td>{{$in->status}}</td>
                                    <td>
                                        @if($in->currency == "" && $in->package != 'International')
                                            N {{round ($ern, 2)}}
                                        @elseif($in->currency == "" && $in->package = 'International')
                                            $ {{round ($ern, 2)}}
                                        @else
                                            {{$in->currency}} {{round ($ern, 2)}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        @else

                        @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>


@endsection
