@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="HTML5 Template Iteck Multi-Purpose themeforest" />
    <meta name="description" content="Iteck - Multi-Purpose HTML5 Template" />
    <meta name="author" content="" />

    <!-- Title  -->
    <title>OTW Computer Gusaha</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/fav.png" title="Favicon" sizes="16x16" />

    <!-- ====== bootstrap icons cdn ====== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="assets/css/lib/bootstrap.min.css">

    <!-- ====== font family ====== -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/css/lib/all.min.css" />
    <link rel="stylesheet" href="assets/css/lib/animate.css" />
    <link rel="stylesheet" href="assets/css/lib/jquery.fancybox.css" />
    <link rel="stylesheet" href="assets/css/lib/lity.css" />
    <link rel="stylesheet" href="assets/css/lib/swiper.min.css" />

    <!-- ====== global style ====== -->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    
    <!--Contents-->
    <main class="services-details-page style-5">

        <!-- ====== start careers-features ====== -->
         
        <section class="ser-details section-padding overflow-hidden" style="padding:40px 0;">

            <div class="container">
                <div class="content">
                    <div class="row gx-5">
                        <div class="col-lg-8">
                          @foreach($data as $item)
<div class="main-info mb-4">
    <div class="main-img img-cover">
        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" 
             style=" width:100%; object-fit:cover;">
    </div>
    <h3 class="text-capitalize mb-20">{{ $item->judul }}</h3>
    <p class="mb-10">
        {!! $item->deskripsi !!}
    </p>
</div>
@endforeach

                            </div>
                        <div class="col-lg-4">
                            <div class="side-links mt-5 mt-lg-0">
                                <div class="links-card mb-40">
                                    <h5> Service Category </h5>
                                    <ul>
                                        <li>
                                            <a href="#"> <i class="far fa-angle-right icon"></i> Social Media Marketing </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="far fa-angle-right icon"></i> Search Engine Optimization </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="far fa-angle-right icon"></i> Product Design </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="far fa-angle-right icon"></i> Email Marketing </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="far fa-angle-right icon"></i> Web Development </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="far fa-angle-right icon"></i> Game Design & Develop </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="banner1">
                                    <div class="title">
                                        <h6> Call To Action </h6>
                                        <h3> Make An Custom Request </h3>
                                    </div>
                                    <a href="#" class="butn bg-white rounded-pill hover-blue5">
                                        <span> OWA <i class="far fa-long-arrow-right ms-2"></i> </span>
                                    </a>
                                    <img src="assets/img/global2.png" alt="" class="mob">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ====== end service category ====== -->

    </main>
    <!--End-Contents-->



    <!-- ====== start to top button ====== -->
    <a href="#" class="to_top bg-gray rounded-circle icon-40 d-inline-flex align-items-center justify-content-center">
        <i class="bi bi-chevron-up fs-6 text-dark"></i>
    </a>
    <!-- ====== end to top button ====== -->

    <!-- ====== request ====== -->
    <script src="assets/js/lib/jquery-3.0.0.min.js"></script>
    <script src="assets/js/lib/jquery-migrate-3.0.0.min.js"></script>
    <script src="assets/js/lib/bootstrap.bundle.min.js"></script>
    <script src="assets/js/lib/wow.min.js"></script>
    <script src="assets/js/lib/jquery.fancybox.js"></script>
    <script src="assets/js/lib/lity.js"></script>
    <script src="assets/js/lib/swiper.min.js"></script>
    <script src="assets/js/lib/jquery.waypoints.min.js"></script>
    <script src="assets/js/lib/jquery.counterup.js"></script>
    <!-- <script src="assets/js/lib/pace.js"></script> -->
    <script src="assets/js/lib/scrollIt.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
@endsection