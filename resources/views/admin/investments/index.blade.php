@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card_header_bg_blue">
                    <div class="card-head-row card-tools-still-right">
                        <h4 class="card-title text-white"> <i class="fas fa-briefcase"></i> {{ __('Investment Packages') }} </h4>
                        <div class="card-tools">
                            <a href="/investments/create" class="btn btn-default"><i class="fa fa-plus"></i> {{ __('Add') }} </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-0 table-responsive">

                    <table class="display table table-stripped table-hover">
                        <thead>
                            <tr>
                            <th> {{ __('Name') }} </th>
                            <th> {{ __('Min') }} </th>
                            <th> {{ __('Max') }} </th>
                            <th> {{ __('Interest(%)') }} </th>
                            <th> {{ __('Period') }} </th>
                            <th> {{ __('Start_date') }} </th>
                            <th> {{ __('End date') }} </th>
                            </tr>
                        </thead>
                        <tbody>


                                @foreach($investment as $investment)
                                    <tr>
                                        <td>{{$investment->name}}</td>
                                        <td>{{$investment->min_invest}}</td>
                                        <td>{{$investment->max_invest}}</td>
                                        <td>{{$investment->interest}}</td>
                                        <td>{{$investment->duration}}</td>
                                        <td>{{$investment->start_date}}</td>
                                        <td>{{$investment->end_date}}</td>
                                        <td>
                                        <label class="switch" >
                                            <input type="checkbox" @if($investment->status == 1){{'checked'}}@endif>
                                            <span id="switch_pack{{$investment->id}}" class="slider round" onclick="act_deact_pack('{{$investment->id}}')"></span>
                                        </label>
                                        </td>

                                        <td>

                                                <a id="{{$investment->id}}" title="Edit Package" href="javascript:void(0)" onclick="edit_pack(this.id, '{{$investment->min_invest}}', '{{$investment->max_invest}}', '{{$investment->interest}}', '{{$investment->duration}}', '{{$investment->start_date}}','{{$investment->start_date}}'">
                                                    <span><i class="fa fa-edit btn btn-warning"></i></span>
                                                </a>
                                                <a id="{{$investment->id}}" title="Delete Package" href="javascript:void(0)" onclick="load_get_ajax('/admin/delete/pack/{{$investment->id}}', this.id, 'admDeleteMsg') ">
                                                    <span><i class="fa fa-times btn btn-danger"></i></span>
                                                </a>

                                        </td>

                                    </tr>
                                @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

