<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="Vora - Saas CodeIgniter Admin Dashboard Template" />
	<meta property="og:title" content="Vora - Saas CodeIgniter Admin Dashboard Template" />
	<meta property="og:description" content="Vora - Saas CodeIgniter Admin Dashboard Template" />
	<meta property="og:image" content="../social-image.png" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>espace etudiant</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="16x16" href="{{url('subfront/images/favicon.png')}}">
    <link href="{{url('subfront/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{url('subfront/vendor/chartist/css/chartist.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('subfront/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{url('subfront/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{url('subfront/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{url('subfront/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{url('subfront/css/style.css')}}" rel="stylesheet" type="text/css"/>



</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

	<!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

		<!--**********************************
    Nav header start
***********************************-->
@include('subfront.layout.header')
<!--**********************************
	Header end
***********************************-->        <!--**********************************
    Sidebar start
***********************************-->
@include('subfront.layout.sidebar')
<!--**********************************
    Sidebar end
***********************************-->
<!--**********************************
	Content body start
***********************************-->
@yield('content')
<!--**********************************
	Content body end
***********************************-->
        <!--**********************************
    Footer start
***********************************-->
@include('subfront.layout.footer')
<!--**********************************
    Footer end
***********************************-->

	</div>
    <script src="{{url('subfront/vendor/global/global.min.js')}}"></script>

    <script src="{{url('subfront/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>

    <script src="{{url('subfront/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>



    <script src="{{url('subfront/vendor/chart.js/Chart.bundle.min.js')}}"></script>

    <script src="{{url('subfront/vendor/owl-carousel/owl.carousel.js')}}"></script>

    <script src="{{url('subfront/vendor/peity/jquery.peity.min.js')}}"></script>

    <script src="{{url('subfront/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

    <script src="{{url('subfront/vendor/apexchart/apexchart.js')}}"></script>

    <script src="{{url('subfront/js/dashboard/dashboard-1.js')}}"></script>

    <script src="{{url('subfront/js/custom.min.js')}}"></script>

    <script src="{{url('subfront/js/plugins-init/datatables.init.js')}}"></script>

    <script src="{{url('subfront/js/dlabnav-init.js')}}"></script>
    <script src="{{url('subfront/js/demo.js')}}"></script>
    <script src="{{url('subfront/js/styleSwitcher.js')}}"></script>


    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>


</html>
