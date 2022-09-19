@extends('admin.layouts.app')


@section('content')
  <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card_header_bg_blue">
              <div class="container">
                <h4 class="card-title text-dark"> {{ __('Settle Withdrawal') }} </h4>

              </div>
            </div>
            <div class="card-body">

              <form action="{{ url('/admin/withdrawals/update', $withdrawal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
              
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label> {{ __('Withdrawal Amount') }} </label>
                        <input type="text" value="{{ $withdrawal->amount }}" class="form-control" q asAREW  readonly>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label> {{ __('Status') }} </label>
                        <input type="text" value="{{ $withdrawal->status }}" class="form-control" name="status">
                      </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-span-12">
                            <button type="submit" class="btn w-100 btn-primary">Update</button>
                        </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div @endsection
