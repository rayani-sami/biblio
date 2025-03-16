@extends('admin.layout.layout')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Settings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>

          <li class="breadcrumb-item active">mise a jour profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">mettre a jour votre profile</h5>
              <form class="forms-sample" action="{{url('admin/update-admin-details')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="exampleInputUsername1" value="{{Auth::guard('admin')->user()->email}}" readonly="">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Admin type</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->type}}" readonly="">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="admin_name" placeholder=" admin_name" name="admin_name"
                      value="{{Auth::guard('admin')->user()->name}}" required="">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">mobile</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="admin_mobile" placeholder=" admin_mobile" name="admin_mobile"
                      value="{{Auth::guard('admin')->user()->mobile}}"  minlength="8" maxlength="13" required="">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="admin_image"  name="admin_image" >
                      @if(!empty(Auth::guard('admin')->user()->image))
                      <a target="_blank" href="{{url (Auth::guard('admin')->user()->image)}}">View image</a>
                      <input type="hidden" name="current_admin_image" value="{{url(Auth::guard('admin')->user()->image)}}" >
                      @endif
                    </div>
                  </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>
        </div>

        <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="{{asset(Auth::guard('admin')->user()->image)}}"  style="height: 120px;width :120px"  alt="Profile" class="rounded-circle">
                <h2>{{Auth::guard('admin')->user()->name}}</h2>
                <h3>{{Auth::guard('admin')->user()->type}}</h3>

              </div>
            </div>

          </div>
      </div>
    </section>

</main>




@endsection
