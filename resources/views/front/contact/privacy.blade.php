@extends('front.layout.layout')
@section('content')


<div class="page-content">
    <!-- inner page banner -->
    <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url('front/images/background/bg3.jpg');">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>politique de confidentialité</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/index')}}"> Home</a></li>
                        <li class="breadcrumb-item">politique de confidentialité</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- inner page banner End-->

    <!-- contact area -->
    <section class="content-inner-1 shop-account">
        <div class="container">
            <div class="row">
                <!-- Left part start -->
                <div class="col-lg-8 col-md-7 col-sm-12 inner-text">
                    <h4 class="title">Politique De Confidentialité</h4>
                    <p class="m-b30">
                        Mapetitebibliotheque (ci-après « Nous ») traite des données à caractère personnel (ci-après les « données personnelles) » vous concernant dans le cadre de l’utilisation de ce site internet (ci-après le « site »).

En tant que responsable de traitement, nous sommes respectueux de la vie privée et nous protégeons les données à caractère personnel des utilisateurs de notre site.</p>
                    <div class="dlab-divider bg-gray-dark"></div>
                    <h4 class="title">
                        Qui nous sommes et ce que couvre cette politique</h4>
                    <p class="m-b30">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                    <h4 class="title">Quelles informations personnelles nous collectons</h4>
                    <ul class="list-check primary m-a0">
                        <li>Les informations personnelles (ou données personnelles) sont définies comme toute information relative à une personne spécifique, telle que son nom</li>
                        <li> son adresse.</li>
                        <li>son adresse IP.</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 m-b30 mt-md-0 mt-4">
                    <aside class="side-bar sticky-top right">
                        <div class="service_menu_nav widget style-1">
                            <ul class="menu">
                                <li class="menu-item"><a href="{{url('/about')}}">About Us</a></li>
                                <li class="menu-item active"><a href="{{url('/privacy')}}">Privacy Policy</a></li>
                                <li class="menu-item"><a href="{{url('/contact')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Privacy Policy END -->
</div>

@endsection
