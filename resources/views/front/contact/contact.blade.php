@extends('front.layout.layout')
@section('content')
<div class="page-content">
    <!-- inner page banner -->
    <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url('front/images/background/bg3.jpg');">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>Contact</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/index')}}"> Home</a></li>
                        <li class="breadcrumb-item">Contact</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="content-inner-2 pt-0">
        <div class="map-iframe">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31690.402927449847!2d10.091117544348942!3d33.882743345291665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMznCsDI4JzA1LjIiTiAxMC4wMzIuOCJX!5e0!3m2!1sen!2stn!4v1629140386024" style="border:0; width:100%; min-height:100%; margin-bottom: -8px;" allowfullscreen></iframe>

        </div>
    </div>

    <section class="contact-wraper1" style="background-image:url('front/images/background/bg2.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-info">
                        <div class="section-head text-white style-1">
                            <h3 class="title text-white">Get In Touch</h3>
                            <p>Si vous êtes intéressé à travailler avec nous, veuillez nous contacter.</p>
                        </div>
                        <ul class="no-margin">
                            <li class="icon-bx-wraper text-white left m-b30">
                                <div class="icon-md">
                                    <span class="icon-cell text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    </span>
                                </div>
                                <div class="icon-content">
                                    <h5 class=" dz-tilte text-white">nos Address</h5>
                                    <p>gabes , tunisia</p>
                                </div>
                            </li>
                            <li class="icon-bx-wraper text-white left m-b30">
                                <div class="icon-md">
                                    <span class="icon-cell text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    </span>
                                </div>
                                <div class="icon-content">
                                    <h5 class="dz-tilte text-white"> Email</h5>
                                    <p>info@gmail<br>services@gmail.com</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 m-b40">
                    <div class="contact-area1 m-r20 m-md-r0">
                        <div class="section-head style-1">
                            <h6 class="sub-title text-primary">CONTACT US</h6>
                            <h3 class="title m-b20">Get In Touch With Us</h3>
                            @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                             <strong>Success:</strong> {{Session::get('success_message')}}
                             <button type="button" class="close" data-dismiss="alert" aria-label="close">x</button>
                            </div>
                          @endif

                          @if($errors->any())
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Error: </strong> <?php echo implode('', $errors->all('<div>:message</div>')) ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="close">X</button>
                          </div>
                           @endif
                        </div>
                        <form  action="{{url('/contact')}}" method="post">@csrf

                            <div class="input-group">
                                <input required type="text" class="form-control" id="username" name="name" placeholder="Full Name">
                            </div>
                            <div class="input-group">
                                <input required type="text" class="form-control" id="email_1" name="email" placeholder="Email Adress">
                            </div>
                            <div class="input-group">
                                <input required type="text" class="form-control" id="mobile" name="mobile" placeholder="Phone No.">
                            </div>
                            <div class="input-group">
                                <input required type="text" class="form-control" id="subject" name="subject" placeholder="subject .">
                            </div>
                            <div class="input-group">
                                <textarea required nid="message" name="message" rows="5" class="form-control">Message</textarea>
                            </div>

                            <div>
                                <button  type="submit"  class="btn w-100 btn-primary btnhover">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Newsletter -->



</div>
@endsection
