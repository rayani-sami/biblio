
@extends('front.layout.layout')
@section('content')

<div class="page-content">
    <!-- inner page banner -->
    <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image: url(front/images/background/bg3.jpg);">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>Login</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/index')}}"> Home</a></li>
                        <li class="breadcrumb-item">Login</li>
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
                            <h4>Nouvelle enseignant</h4>

                            <a class="btn btn-primary btnhover m-r5 button-lg radius-no" href="{{url('/enseignant/register')}}">CREATE AN ACCOUNT</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="login-area">
                        <p id="login-error"></p>
                         <p id="login-success"></p>
                        <div class="tab-content nav">
                            <form  action="{{url('admin/login')}}" class="tab-pane active col-12" method="post">@csrf
                                <h4 class="text-secondary">LOGIN</h4>

                                <div class="mb-4">
                                    <label class="label-title">E-MAIL *</label>
                                    <input name="email" id="email" required="" class="form-control" placeholder="Your Email Id" type="email">
                                    <p id="login-email"></p>
                                </div>
                                <div class="mb-4">
                                    <label class="label-title">PASSWORD *</label>
                                    <input name="password" id="password" required="" class="form-control " placeholder="Type Password" type="password">
                                    <p id="login-password"></p>
                                </div>
                                <div class="text-left">
                                    <button class="btn btn-primary btnhover me-2">login</button>
                                    <a  href="{{url('user/forgot-password')}}" class="m-l5"><i class="fas fa-unlock-alt"></i> Forgot Password</a>
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
