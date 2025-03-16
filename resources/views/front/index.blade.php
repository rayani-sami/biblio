@extends('front.layout.layout')
@section('content')
<div class="page-content bg-white">

    <!--Swiper Banner Start -->
    <div class="main-slider style-1">
        <div class="main-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide bg-blue" style="background-image: {{url('front/images/background/waveelement.png')}};">
                    <div class="container">
                        <div class="banner-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="swiper-content">


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="banner-media" data-swiper-parallax="-100">
                                        <img src="{{url('front/images/banner/banner-media4.png')}}" alt="banner-media">
                                    </div>
                                    <img class="pattern" src="{{url('front/images/Group.png')}}" data-swiper-parallax="-100" alt="dots">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide bg-blue" style="background-image: {{url('front/images/background/waveelement.png')}};">
                    <div class="container">
                        <div class="banner-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="swiper-content">


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="banner-media" data-swiper-parallax="-100">
                                        <img src="{{url('front/images/banner/banner-media2.png')}}" alt="banner-media1">
                                    </div>
                                    <img class="pattern" src="{{url('front/images/Group.png')}}" data-swiper-parallax="-100" alt="dots">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container swiper-pagination-wrapper">
                <div class="swiper-pagination-five"></div>
            </div>
        </div>
        <div class="swiper main-swiper-thumb">
            <div class="swiper-wrapper">
                <div class="swiper-slide">

                </div>
                <div class="swiper-slide">

                </div>
                <div class="swiper-slide">

                </div>
                <div class="swiper-slide">

                </div>
            </div>
        </div>
    </div>
    <!--Swiper Banner End-->




    <!-- Testimonial -->
    <section class="content-inner-2 testimonial-wrapper">
        <div class="container">
            <div class="testimonial">
                <div class="section-head book-align">
                    <div>
                        <h2 class="title mb-0">Les espaces</h2>
                        <p class="m-b0">login avec  votre compte </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="swiper-container testimonial-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testimonial-1 wow fadeInUp" data-wow-delay="1s">
                        <div class="testimonial-info">

                            <div class="testimonial-text" >

                                <p>  <a href="{{url('admin/login')}}"> espace administrateur </a></p>

                            </div>
                            <div class="testimonial-detail">
                                <div class="testimonial-pic" >
                                    <img src="{{url('front/images/testimonial/a123.png')}}"  alt="">
                                </div>
                                <div class="info-right">
                                    <h6 class="testimonial-name"> <a href="{{url('admin/login')}}">  admin </a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial-1 wow fadeInUp" data-wow-delay="2s">
                        <div class="testimonial-info">

                            <div class="testimonial-text">
                                <p> <a href="{{url('/enseignant/login')}}">espace enseignant </a></p>
                            </div>
                            <div class="testimonial-detail">
                                <div class="testimonial-pic radius">
                                    <img src="{{url('front/images/testimonial/ense12.png')}}" alt="">
                                </div>
                                <div>
                                    <h6 class="testimonial-name"><a href="{{url('/enseignant/login')}}">enseignant</a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial-1 wow fadeInUp" data-wow-delay="3s">
                        <div class="testimonial-info">

                            <div class="testimonial-text">
                                <p> <a href="{{url('user/login')}}"> espace etudiant </a></p>
                            </div>
                            <div class="testimonial-detail">
                                <div class="testimonial-pic radius">
                                    <img src="{{url('front/images/testimonial/user.png')}}" alt="">
                                </div>
                                <div>
                                    <h6 class="testimonial-name"> <a href="{{url('user/login')}}"> etudiant</a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Testimonial End -->


    <!-- Latest News End -->

    <!-- Feature Box -->

    <!-- Feature Box End -->

<br>
<br>
<br>
<br><br>



</div>
@endsection
