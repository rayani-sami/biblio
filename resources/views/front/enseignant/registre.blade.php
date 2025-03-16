
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
                    @if(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success: </strong> {{Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">x</button>
                    </div>
                  @endif
                  @if(Session::has('error_message'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error: </strong> {{Session::get('error_message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="close">x</button>
                  </div>
                   @endif
                   @if($errors->any())
                   <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Error: </strong> <?php echo implode('', $errors->all('<div>:message</div>')) ?>
                   <button type="button" class="close" data-dismiss="alert" aria-label="close"></button>
                   </div>
                    @endif
                    <div class="login-area">
                        <form id="enseignantForm" action="{{url('enseignant/register')}}" method="post">@csrf
                            <h4 class="text-secondary">Inscription</h4>
                            <p class="font-weight-600">Si vous n'avez pas de compte chez nous, veuillez vous inscrire.</p>
                            <div class="mb-4">
                                <label class="label-title">Username *</label>
                                <input id="enseignantname" name="name" required="" class="form-control" placeholder="Your Username" type="text">

                            </div>
                            <div class="mb-4">
                                <label class="label-title">mobile *</label>
                                <input id="enseignantmobile" name="mobile" required="" class="form-control" placeholder="Your  mobile" type="number">

                            </div>

                            <div class="mb-4">
                                <label class="label-title">Email address *</label>
                                <input id="enseignantemail" name="email" required="" class="form-control" placeholder="Your Email address" type="email">

                            </div>
                            <div class="mb-4">
                                <label class="label-title">Password *</label>
                                <input  id="enseignantpassword" name="password" required="" class="form-control " placeholder="Type Password" type="password">

                            </div>
                            <div class="mb-5">
                                <small>Vos données personnelles seront utilisées pour soutenir votre expérience sur ce site Web, pour gérer l'accès à votre compte et à d'autres fins décrites dans notre <a href="{{url('/privacy')}}">privacy policy</a>.</small>
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
