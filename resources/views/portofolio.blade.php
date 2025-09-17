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
    <main class="portfolio-page style-1">
        <!-- ====== start portfolio-projects ====== -->
        <section class="portfolio-projects section-padding pt-50 style-1">
            <div class="container">
                <div class="section-head text-center mb-60 style-5">
                    <h2 class="mb-20"> Our <span> Projects </span> </h2>
                    <p> We have an experienced team of production and inspection personnel to ensure quality. </p>
                </div>
           <div class="controls">
    <button type="button" class="control" data-filter="all">All</button>
    @foreach ($categories as $category)
        <button type="button" class="control" data-filter=".{{ Str::slug($category->name) }}">
            {{ $category->name }}
        </button>
    @endforeach
</div>

                <section class="portfolio style-1">
                    <div class="content">
                      <div class="row mix-container">
                            @foreach ($data as $item)
                                <div class="col-lg-4 mix {{ $item->category ? Str::slug($item->category->name) : '' }}">
                                    <div class="portfolio-card mb-50">
                                        <div class="img">
                                            <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('assets/img/projects/prog/1.jpeg') }}" alt="{{ $item->judul }}">
                                        </div>
                                        
                                        <div class="info">
                                            <h5>
                                                <a href="{{ route('portfolio.detail', $item->id) }}"> {{ $item->judul }} </a>
                                            </h5>
                                            <div class="mt-3 ">
                                                <a href="#"
                                                style="background:none; color:#0d6efd; font-weight:600; text-transform:uppercase; text-decoration:none; font-size:14px;">
                                                    {{ $item->category ? $item->category->name : 'Tag' }}
                                                </a>
                                            </div>


                                            <div class="text">
                                                {{ Str::limit(strip_tags($item->deskripsi), 100, '...') }}
                                            </div>

                                           
                                        </div>
                                    </div>
                                </div>

                            @endforeach  
                        </div>

                    </div>
                    <div class="text-center">
                        <a href="{{ url('/portfolio-load-more') }}" class="btn rounded-pill blue5-3Dbutn hover-blue2 sm-butn fw-bold mt-30">
                            <span>Load More (24)</span>
                        </a>
                    </div>
                </section>
            </div>
        </section>
        <section class="download section-padding style-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="content text-center">
                            <h2>Access your business potentials today & find opportunity for 
                                <span>
                                    bigger success 
                                    <img src="assets/img/header/head5_line.png" alt="" class="head-line">
                                    <img src="assets/img/header/head5_pen.png" alt="" class="head-pen">         
                                </span>
                            </h2>
                            <div class="butns mt-70">
                                <a href="{{ url('/start-project') }}" class="btn rounded-pill blue5-3Dbutn hover-blue2 sm-butn fw-bold mx-1">
                                    <span>Start A Project Now</span>
                                </a>
                                <a href="{{ url('/pricing-plan') }}" class="btn rounded-pill blue5-3Dbutn hover-blue2 sm-butn fw-bold mx-1">
                                    <span>See Pricing & Plan</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="assets/img/contact_globe.svg" alt="" class="contact_globe">
        </section>
        <!-- ====== end portfolio-projects ====== -->


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
    <script src="assets/js/lib/mixitup.min.js"></script>
    <script src="assets/js/lib/scrollIt.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
@endsection