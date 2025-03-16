@extends('front.layout.layout')
@section('content')
<div class="page-content">
    <!-- inner page banner -->
    <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url(images/background/bg3.jpg);">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>Services</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/index')}}"> Home</a></li>
                        <li class="breadcrumb-item">Services</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- inner page banner End-->
    <!-- Services -->
    <section class="content-inner bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="content-box style-1 m-b30">
                        <div class="dz-info">
                            <h4 class="title">24*7 Support</h4>
                            <p> le site est toujours disponible</p>
                        </div>
                        <div class="dz-banner-media1.jpg m-b30">
                            <img src="{{url('front/images/services/service2.jpg')}}" alt="">
                        </div>
                        <div class="dz-bottom">
                            <a href="{{url('/service')}}" class="btn-link btnhover3">READ MORE<i class="fas fa-arrow-right m-l10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="content-box style-1 m-b30">
                        <div class="dz-info">
                            <h4 class="title">Disposition assise</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                        </div>
                        <div class="dz-banner-media1.jpg m-b30">
                            <img src="{{url('front/images/services/service1.jpg')}}" alt="">
                        </div>
                        <div class="dz-bottom">
                            <a href="{{url('/service')}}" class="btn-link btnhover3">READ MORE<i class="fas fa-arrow-right m-l10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="content-box style-1 m-b30">
                        <div class="dz-info">
                            <h4 class="title">Bonne gestion</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                        </div>
                        <div class="dz-banner-media1.jpg m-b30">
                            <img src="{{url('front/images/services/service3.jpg')}}" alt="">
                        </div>
                        <div class="dz-bottom">
                            <a href="{{url('/service')}}" class="btn-link btnhover3">READ MORE<i class="fas fa-arrow-right m-l10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="content-box style-1 m-b30">
                        <div class="dz-info">
                            <h4 class="title">Enregistrement en ligne</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                        </div>
                        <div class="dz-banner-media1.jpg m-b30">
                            <img src="{{url('front/images/services/service4.jpg')}}" alt="">
                        </div>
                        <div class="dz-bottom">
                            <a href="{{url('/service')}}" class="btn-link btnhover3">READ MORE<i class="fas fa-arrow-right m-l10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="content-box style-1 m-b30">
                        <div class="dz-info">
                            <h4 class="title">Télécharger le PDF</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                        </div>
                        <div class="dz-banner-media1.jpg m-b30">
                            <img src="{{url('front/images/services/service5.jpg')}}" alt="">
                        </div>
                        <div class="dz-bottom">
                            <a href="" class="btn-link btnhover3">READ MORE<i class="fas fa-arrow-right m-l10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="content-box style-1 m-b30">
                        <div class="dz-info">
                            <h4 class="title">Calendrier flexible</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
                        </div>
                        <div class="dz-banner-media1.jpg m-b30">
                            <img src="{{url('front/images/services/service6.jpg')}}" alt="">
                        </div>
                        <div class="dz-bottom">
                            <a href="services.html" class="btn-link btnhover3">READ MORE<i class="fas fa-arrow-right m-l10"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Feature Box -->
    <section class="content-inner bg-light">
        <div class="container">
            <div class="row sp15">
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="icon-bx-wraper style-2 m-b30 text-center">
                        <div class="icon-bx-lg">
                            <i class="fa-solid fa-users icon-cell"></i>
                        </div>
                        <div class="icon-content">
                            <h2 class="dz-title counter m-b0">{{$totaluser}}</h2>
                            <p class="font-20">Happy studient</p>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="icon-bx-wraper style-2 m-b30 text-center">
                        <div class="icon-bx-lg">
                            <i class="fa-solid fa-book icon-cell"></i>
                        </div>
                        <div class="icon-content">
                            <h2 class="dz-title counter m-b0">{{$totalbook}}</h2>
                            <p class="font-20">Book Collections</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="icon-bx-wraper style-2 m-b30 text-center">
                        <div class="icon-bx-lg">
                            <i class="fa-solid fa-store icon-cell"></i>
                        </div>
                        <div class="icon-content">
                            <h2 class="dz-title counter m-b0">{{$totalexamen}}</h2>
                            <p class="font-20">examens</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="icon-bx-wraper style-2 m-b30 text-center">
                        <div class="icon-bx-lg">
                            <i class="fa-solid fa-leaf icon-cell"></i>
                        </div>
                        <div class="icon-content">
                            <h2 class="dz-title counter m-b0">457</h2>
                            <p class="font-20">rapport</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Box End -->
    <!-- Client Start-->

    <!-- Client End-->

    <!-- Newsletter -->

    <!-- Newsletter End -->

</div>

@endsection
