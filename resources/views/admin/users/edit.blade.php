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
                <h4 class="card-title text-white"> {{ __('User Details') }} </h4>

              </div>
            </div>
            <div class="card-body">
              <form action="{{ url('/admin/wallet/update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf "
                @method('PUT')
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label> {{ __('First Name') }} </label>
                        <input type="text" value="{{ $user->first_name }}"  class="form-control" name="first_name"
                          readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label> {{ __('Last Name') }} </label>
                        <input type="text" value="{{ $user->last_name }}" class="form-control" name="last_name"
                          readonly>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label> {{ __('Wallet Balance') }} </label>
                        <input type="text" value="{{ $user->wallet }}" class="form-control" name="wallet">
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
