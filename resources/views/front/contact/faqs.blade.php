@extends('front.layout.layout')
@section('content')

<div class="page-content">
    <!-- inner page banner -->
    <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url('front/images/background/bg3.jpg');">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>FAQ's</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/index')}}"> Home</a></li>
                        <li class="breadcrumb-item">FAQ's</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- inner page banner End-->
    <!-- FAQ Content Start -->
    <section class="main-faq-content content-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center mb-4">
                    <div class="faq-content-box">
                        <div class="section-head">
                            <h2 class="title">
                                Qu’est-ce que bibiotheque ?</h2>
                            <p>Une bibliothèque numérique (virtuelle ou en ligne ou électronique) est une collection de documents (textes, images, sons) numériques (c'est-à-dire numérisés ou nés numériques) accessibles à distance (en particulier via Internet), proposant différentes modalités d'accès à l'information aux publics.</p>
                        </div>
                        <div class="faq-accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h3 class="title" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><span>Quelle est la signification d’une bibliothèque en ligne ?</span> <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                                    </div>
                                    <div id="collapseOne" class="collapse accordion-collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            <p> une base de données en ligne d'objets numériques pouvant inclure du texte, des images fixes, de l'audio, de la vidéo, des documents numériques, ou d'autres formats de médias numériques ou une bibliothèque accessible via l'internet.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h3 class="title" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span>Quel est l'avantage d'une bibliothèque électronique ?</span> <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                                    </div>
                                    <div id="collapseTwo" class="collapse accordion-collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>Certains des avantages les plus notables des bibliothèques numériques sont les suivants : Aucune frontière physique : un utilisateur d'une bibliothèque numérique n'a pas besoin de se rendre physiquement dans la bibliothèque ; des personnes du monde entier peuvent accéder aux mêmes informations tant qu’une connexion Internet est disponible.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h3 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><span>Quelle est le rôle de la bibliothèque ?</span> <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                                    </div>
                                    <div id="collapseThree" class="collapse accordion-collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>Les bibliothèques jouent un rôle clé en favorisant l'alphabétisation et l'apprentissage, en posant les fondations du développement et en sauvegardant le patrimoine culturel et scientifique de l'humanité.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1 mb-4">
                    <div class="faq-img-box wow left-animation rounded-md" data-wow-delay="0.2s">
                        <img src="{{url('front/images/about/pic2.jpg')}}" alt="FAQ Image">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- FAQ Content End -->

    <!-- Feature Box -->
    <section class="content-inner bg-white">
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
                            <p class="font-20">Famous Writers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Box End -->
</div>
@endsection
