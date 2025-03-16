@extends('front.layout.layout')
@section('content')

<div class="page-content">
    <!-- inner page banner -->
    <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image: url(front/images/background/bg3.jpg);">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>forgot password</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/index')}}"> Home</a></li>
                        <li class="breadcrumb-item">forgot password</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- inner page banner End-->

    <!-- contact area -->
    <section class="content-inner shop-account">
        <!-- Product -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="login-area">
                        <div class="tab-content">
                            <h4>NEW Studiant</h4>
                            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                            <a class="btn btn-primary btnhover m-r5 button-lg radius-no" href="{{url('/user/register')}}">CREATE AN ACCOUNT</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="login-area">
                        <div class="tab-content nav">
                            
                            <p id="forgot-error"></p>
                            <p id="forgot-success"></p>
                            <form id="forgotForm" action="javascript:;" class="tab-pane active col-12" method="post">@csrf
                                <div class="mb-4">
                                    <label class="label-title">E-MAIL *</label>
                                    <input name="email" id="users-email" required="" class="form-control" placeholder="Your Email Id" type="email">
                                    
                                </div>
                                <div class="text-left">
                                    <button class="btn btn-primary btnhover me-2">submit</button>
                                    <a  href="{{url('user/login')}}" class="m-l5"><i class="fas fa-unlock-alt"></i> back to login</a>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product END -->
    </section>
    <!-- contact area End-->
 </div>

@endsection