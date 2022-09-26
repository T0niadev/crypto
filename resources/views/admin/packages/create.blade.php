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
                <h4 class="card-title text-dark"> {{ __('Add Package') }} </h4>

              </div>
            </div>
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif

             <form method="POST" action="{{ url('/admin/packages/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label> {{ __('Package Name') }} </label>
                        <input type="" name="name" class="form-control" >
                      </div>
                    </div>

                    <div class="col-lg-6 mt-2">
                      <div class="form-group">
                        <label> {{ __('ROI') }} </label>
                        <input type="percentage" name="roi" class="form-control" >
                      </div>
                    </div>

                    <div class="col-lg-6 mt-2">
                      <div class="form-group">
                        <label> {{ __('Start Date') }} </label>
                        <input type="date" name="start_date" class="form-control" >
                      </div>
                    </div>

                    <div class="col-lg-6 mt-2">
                      <div class="form-group">
                        <label> {{ __('Minimum Amount  ($)') }} </label>
                        <input type="number" name="min_amount" class="form-control" >
                      </div>
                    </div>

                    <div class="col-lg-6 mt-2">
                      <div class="form-group">
                        <label> {{ __('Maximum Amount  ($)') }} </label>
                        <input type="number" name="max_amount" class="form-control" >
                      </div>
                    </div>

                    <div class="col-lg-6 mt-2">
                      <div class="form-group">
                        <label> {{ __('Duration') }} </label>
                        <input type="number" name="duration" class="form-control" >
                      </div>
                    </div>


                    <div class="col-lg-6 mt-2">
                      <div class="form-group">
                        <label> {{ __('Duration Mode:') }} </label>
                        <select name="duration_mode" id="duration_mode">
                            <option value="days">days</option>
                            <!-- <option value="months">months</option>
                            <option value="year">year</option> -->
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-6 mt-2">
                      <div class="form-group">
                        <label> {{ __('Description') }} </label>
                        <input type="" name="description" class="form-control" >
                      </div>
                    </div>


                    <div class="col-lg-6 mt-2">
                      <div class="form-group">
                        <label> {{ __('Status:') }} </label>
                        <select name="status" id="status">
                         <option value="open">Open</option>
                         <option value="closed">Closed</option>
                        
                        </select>
                      </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-span-12">
                            <button type="submit" href="/admin/packages/store" class="btn w-100 btn-primary">Submit</button>
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
</div 
@endsection
