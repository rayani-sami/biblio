@extends('admin.layout.layout')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Settings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">
            @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success: </strong> {{Session::get('success_message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">X</button>
            </div>
            @endif
            @if(Session::has('success_error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>error: </strong> {{Session::get('error_message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">X</button>
            </div>
          @endif
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">update password </h5>
              <form  action="{{url('/admin/update-admin-password')}}" method="post">@csrf
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Your Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText"  value="{{$adminDetails['name']}}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" value="{{$adminDetails['email']}}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="current_passwords" class="col-sm-2 col-form-label">Current Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="current_password" placeholder=" Enter current password" name="current_password" required>
                    <span id="check_password"></span>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="new_password" placeholder="enter new Password" required="" name="new_password">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="confirm_password" placeholder="confirm_password" required="" name="confirm_password">
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
      </div>
    </section>

  </main>

@endsection
