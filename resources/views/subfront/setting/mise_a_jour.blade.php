@extends('subfront.layout.layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
<main id="main" class="main">

    <div class="pagetitle">


    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">
            @if ($errors->any())
            <div class="alert alert-danger">
                 <ul>
                  @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                  @endforeach
                  </ul>
              </div>
          @endif
          @if(Session::has('success_message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success: </strong> {{Session::get('success_message')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="close">X</button>
          </div>
          @endif
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">mettre a jour votre profile</h5>
              <form class="forms-sample" action="{{url('/subfront/user/account')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="exampleInputUsername1" value="{{Auth::user()->email}}" readonly="">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">specialite</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="exampleInputUsername1" value="{{ $nomSec }}" readonly="">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">niveau</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="exampleInputUsername1" value="{{ $nomNiveau }}" readonly="">
                    </div>
                  </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="user_name" placeholder=" user_name" name="user_name"
                      value="{{Auth::user()->name}}" >
                    </div>
                </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">mobile</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="user_mobile" placeholder=" user_mobile" name="user_mobile"
                      value="{{Auth::user()->mobile}}" minlength="8" maxlength="13" >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="user_image"  name="user_image" >
                      @if(!empty(Auth::user()->image))
                      <a target="_blank" href="{{url (Auth::user()->image)}}">View image</a>
                      <input type="hidden" name="current_user_image" value="{{url(Auth::user()->image)}}" >
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
                @if (Auth::user()->image)
                <img src="{{url(Auth::user()->image)}}"  style="height: 120px;width :120px"  alt="Profile" class="rounded-circle">
                @else
                <img src="{{url('front/images/user.png')}}"  style="height: 120px;width :120px"  alt="Profile" class="rounded-circle">
                @endif

                <h2>{{Auth::user()->name}}</h2>
                <h3></h3>

              </div>
            </div>

          </div>
      </div>
    </section>

</main>




@endsection
