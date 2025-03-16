
@extends('front.layout.layout')
@section('content')

<div class="page-content">
    <!-- inner page banner -->
    <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url('front/images/background/bg3.jpg');">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>Registration</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/index')}}"> Home</a></li>
                        <li class="breadcrumb-item">Registration</li>
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
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="login-area">
                        <form id="registerForm" action="javascript:;" method="post">@csrf
                            <h4 class="text-secondary">Inscription</h4>
                            <p class="font-weight-600">Si vous n'avez pas de compte chez nous, veuillez vous inscrire.</p>
                            <div class="mb-4">
                                <label class="label-title">Username *</label>
                                <input id="user-name" name="name" required="" class="form-control" placeholder="Your Username" type="text">
                                <p id="register-name"></p>
                            </div>
                            <div class="mb-4">
                                <label class="label-title">mobile *</label>
                                <input id="user-mobile" name="mobile" required="" class="form-control" placeholder="Your  mobile" type="number">
                                <p id="register-mobile"></p>
                            </div>
                            <div class="mb-4">
                                <label class="label-title">specialite *</label>
                                <select class="form-control" id="specialite" name="specialite">
                                    <option value="select">select</option>
                                    @foreach($specialites as $specialite)

                                        <option value="{{ $specialite['id'] }}">{{ $specialite['name'] }}</option>
                                    @endforeach
                                </select>
                                <p id="register-specialite"></p>
                            </div>
                            <div class="mb-4">
                                <label class="label-title">niveau *</label>
                                <select class="form-control" id="niveau" name="niveau">
                                    <option value="select">select</option>
                                    @foreach($niveaux as $niveau)
                                        <option value="{{ $niveau['id']}}">{{ $niveau['niveau_name'] }}</option>
                                    @endforeach
                                </select>
                                <p id="register-niveau"></p>
                            </div>

                            <div class="mb-4">
                                <label class="label-title">Email address *</label>
                                <input id="user-email" name="email" required="" class="form-control" placeholder="Your Email address" type="email">
                                <p id="register-email"></p>
                            </div>
                            <div class="mb-4">
                                <label class="label-title">Password *</label>
                                <input  id="user-password" name="password" required="" class="form-control " placeholder="Type Password" type="password">
                                <p id="register-password"></p>
                            </div>
                            <div class="mb-5">
                                <small>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="{{url('/privacy')}}">privacy policy</a>.</small>
                            </div>
                            <div class="text-left">
                                <button class="btn btn-primary btnhover w-100 me-2" >Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product END -->
    </section>
    <!-- contact area End-->
</div>

@endsection
