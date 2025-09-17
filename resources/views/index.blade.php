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
    <meta name="keywords" content="OTW Computer Gusaha" />
    <meta name="description" content="Tumbuh dengan Teknologi - OTW Computer Gusaha" />
    <meta name="author" content="" />

    <!-- Title  -->
    <title>OTW Computer Gusaha</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/icon.png" title="Favicon" sizes="16x16" />

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
    
    <!-- ====== start header ====== -->
    <header class="section-padding style-1">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="info">
                            <div class="section-head mb-60">
                                <h6 class="color-main text-uppercase">OTW Computer Gusaha</h6>
                                <h2>
                                    Tumbuh <span class="fw-normal">dengan </span> Teknologi
                                </h2>
                            </div>
                            <div class="text">
                                Kami hadir sebagai solusi teknologi terpercaya untuk meningkatkan efisiensi dan mempercepat pertumbuhan bisnis Anda.
                            </div>
                            <div class="bttns mt-5">
                                <a href="{{ url('/services5') }}" class="btn btn-dark">
                                    <span>our services</span>
                                </a>
                                <a href="https://www.youtube.com/shorts/lIf_WV5879U" data-lity class="vid-btn">
                                    <i class="bi bi-play wow heartBeat infinite slow"></i>
                                    <span>
                                        Kegiatan <br> Kami
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="img">
                            <img src="assets/img/header/content1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="assets/img/header/head_shape_r.png" alt="" class="head-shape-r wow">
        <img src="assets/img/header/head_shape_l.png" alt="" class="head-shape-l wow">
    </header>
    <!-- ====== end header ====== -->


    <!--Contents-->
    <main>

    <!-- ====== start services ====== -->
  <section class="services section-padding style-1">
    <div class="container">
        <div class="row">
            <div class="col offset-lg-1">
                <div class="section-head mb-60">
                    <h6 class="color-main text-uppercase wow fadeInUp">Layanan Kami</h6>
                    <h2 class="wow fadeInUp">
                        <span class="fw-normal">Layanan Teknologi untuk Kebutuhan</span> Bisnis Anda
                    </h2>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="row">
                @foreach($layanans as $index => $layanan)
                <div class="col-lg-4">
                    <div class="service-box mb-4 wow fadeInUp" data-wow-delay="{{ $index * 0.2 }}s">
                        <h5>
                            <a href="#">
                                {{ $layanan->nama }}
                            </a> 
                            <span class="num">{{ str_pad($index+1, 2, '0', STR_PAD_LEFT) }}</span>
                        </h5>
                        <div class="icon">
                            @if($layanan->gambar)
                                <img src="{{ asset('storage/'.$layanan->gambar) }}" alt="{{ $layanan->nama }}">
                            @else
                                <img src="assets/img/icons/serv_icons/default.png" alt="icon">
                            @endif
                        </div>
                        <div class="info">
                            <div class="text">
                                  {!! Str::limit(strip_tags($layanan->deskripsi), 80) !!}
                            </div>
                            <div class="tags">
                                @if($layanan->kategori)
                                    <a href="#">{{ $layanan->kategori->nama }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <img src="assets/img/services/ser_shap_l.png" alt="" class="ser_shap_l">
    <img src="assets/img/services/ser_shap_r.png" alt="" class="ser_shap_r">
</section>

    <!-- ====== end services ====== -->

    <!-- ====== start about ====== -->
    <section class="about style-1">
        <div class="container">
            <div class="content">
                <div class="about-logos d-flex align-items-center justify-content-between border-bottom border-1 brd-light pb-20">
                    <a href="#" class="logo wow fadeInUp" data-wow-delay="0">
                        <img src="assets/img/logo_otw/2.png" style="width: 200px; height: auto;" alt="">
                    </a>
                    <a href="#" class="logo wow fadeInUp" data-wow-delay="0.2s">
                        <img src="assets/img/logo_otw/3.png" style="width: 200px; height: auto;" alt="">
                    </a>
                    <a href="#" class="logo wow fadeInUp" data-wow-delay="0.4s">
                        <img src="assets/img/logo_otw/4.png" style="width: 200px; height: auto;" alt="">
                    </a>
                    <a href="#" class="logo wow fadeInUp" data-wow-delay="0.6s">
                        <img src="assets/img/logo_otw/5.png" style="width: 200px; height: auto;" alt="">
                    </a>
                    <a href="#" class="logo wow fadeInUp" data-wow-delay="0.8s">
                        <img src="assets/img/logo_otw/6.png" style="width: 200px; height: auto;" alt="">
                    </a>
                </div>
                <div class="about-info">
                    <div class="row justify-content-between">
                        <div class="col-lg-5">
                            <div class="title">
                                <h3 class=" wow fadeInUp slow">“Technology is best when it brings people  together.”</h3>
                                <small class=" wow fadeInUp slow fw-bold">Patricia Cross</small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info">
                                <h6 class=" wow fadeInUp slow">We can help to maintain and modernize your IT infrastructure  & solve various infrastructure-specific issues a business may face.</h6>
                                <p class=" wow fadeInUp slow">Iteck Co is the partner of choice for many of the world’s leading  enterprises, SMEs and technology challengers. We help businesses  elevate their value through custom software development, product  design, QA and consultancy services.</p>    
                                    <a href="{{ url('/more-about-us') }}" class="btn btn-outline-light mt-5 sm-butn wow fadeInUp slow">
                                        <span>more about us</span>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-numbers">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="num-item wow fadeInUp" data-wow-delay="0">
                                <div class="num">
                                    <span class="counter">
                                        20 
                                    </span>
                                    <span>
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                                <div class="inf">
                                    Years of Experience
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="num-item wow fadeInUp" data-wow-delay="0.2s">
                                <div class="num">
                                    <span class="counter">
                                        15
                                    </span>
                                    <span>
                                        K
                                    </span>
                                </div>
                                <div class="inf">
                                    Projects completed
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="num-item wow fadeInUp" data-wow-delay="0.4s">
                                <div class="num">
                                    <span class="counter">
                                        240
                                    </span>
                                </div>
                                <div class="inf">
                                    Awards achievied
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="num-item wow fadeInUp" data-wow-delay="0.6s">
                                <div class="num">
                                    <span class="counter">
                                        180
                                    </span>
                                </div>
                                <div class="inf">
                                    Satisfied clients on 24 countries
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="assets/img/about/num_shap.png" alt="" class="about_shap">
            </div>
        </div>
    </section>
    <!-- ====== end about ====== -->

    <!-- ====== start portfolio ====== -->
  <section class="portfolio section-padding bg-white style-1">
    <div class="container">
        <div class="row">
            <div class="col offset-lg-1">
                <div class="section-head mb-60">
                    <h6 class="color-main text-uppercase wow fadeInUp">Portfolio</h6>
                    <h2 class="wow fadeInUp">
                        Latest Projects <span class="fw-normal">From Our Team</span>
                    </h2>
                </div>
            </div>
        </div>

        <div class="content wow fadeIn slow">
            <div class="portfolio-slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        @foreach($portofolios as $item)
                        <div class="swiper-slide">
                            <div class="portfolio-card" 
                                style="display:flex; flex-direction:column; justify-content:space-between; 
                                height:100%; box-sizing:border-box; padding:15px;
                                background-color:#f0f0f0; border-radius:10px;">

                                <!-- Gambar -->
                                <div style="flex-shrink:0;">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" 
                                        alt="{{ $item->judul }}" 
                                        style="width:100%; height:auto; max-height:200px; object-fit:cover;">
                                </div>

                                <!-- Info -->
                                <div class="info" style="flex-grow:1; display:flex; flex-direction:column; justify-content:space-between;">
                                    <h5><a href="{{ route('portfolio.detail', $item->id) }}">{{ $item->judul }}</a></h5>
                                    <small class="d-block color-main text-uppercase">
                                        <a href="#">{{ $item->category->name ?? '-' }}</a>
                                    </small>

                                    <!-- Deskripsi -->
                                    <div class="text" style="flex-grow:1; cursor:pointer;">
                                        <span class="short-text">
                                          {!! Str::limit(strip_tags($item->deskripsi), 80) !!}

                                        </span>
                                       
                                    </div>

                                    <!-- Tags -->
                                    <div class="tags" style="margin-top:auto; display:flex; gap:8px; flex-wrap:wrap;">
                                        @if(!empty($item->tags))
                                            @foreach(explode(',', $item->tags) as $tag)
                                                <a href="#" style="background:#fff; padding:5px 10px; border-radius:6px; 
                                                                font-size:10px; text-decoration:none; color:#333; 
                                                                border:1px solid #ccc; display:inline-block;">
                                                    {{ trim($tag) }}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <!-- Pagination & Navigation -->
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- ====== end portfolio ====== -->

    
    <!-- ====== start testimonials ====== -->
    <section class="testimonials section-padding style-1">
        <div class="container">
            <div class="section-head mb-60 text-center">
                <h6 class="color-main text-uppercase wow fadeInUp">testimonials</h6>
                <h2 class="wow fadeInUp">
                    The Trust <span class="fw-normal">From Clients</span>
                </h2>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="vid_img mb-2 mb-md-0 wow zoomIn slow">
                            <img src="assets/img/testimonials/testi.jpeg" alt="">
                            <a href="https://youtu.be/pGbIOC83-So?t=21" data-lity class="play_icon">
                                <i class="bi bi-play"></i>
                            </a>
                            <div class="img_info wow fadeInUp">
                                <h4><a href="#">Casper Defloy</a></h4>
                                <small><a href="#">Tech Leader at Esty Inc</a></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="info wow fadeInUp">
                            <div class="client_card mb-2" data-wow-delay="0">
                                <div class="user_img">
                                    <img src="assets/img/testimonials/user1.jpeg" alt="">
                                </div>
                                <div class="inf_content">
                                    <div class="rate_stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <h6>
                                        “Iteck provide perfect IT solutions, fast process and affordable price. We’re really satisfied!”
                                    </h6>
                                    <p>Ibrahima K.  <span class="text-muted">/  Senior Marketing at Amazon</span></p>
                                </div>
                            </div>
                            <div class="client_card mb-2" data-wow-delay="0.2s">
                                <div class="user_img">
                                    <img src="assets/img/testimonials/user2.jpeg" alt="">
                                </div>
                                <div class="inf_content">
                                    <div class="rate_stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <h6>
                                        “Iteck - 1st my choice for cloud services method”
                                    </h6>
                                    <p> Ben S.  <span class="text-muted">/  CEO at ThemesCamp</span></p>
                                </div>
                            </div>
                            <div class="client_card" data-wow-delay="0.4s">
                                <div class="user_img">
                                    <img src="assets/img/testimonials/user3.jpeg" alt="">
                                </div>
                                <div class="inf_content">
                                    <div class="rate_stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <h6>
                                        “Our profit increased so much. Really Awesome!”
                                    </h6>
                                    <p>Alexander A.  <span class="text-muted">/  Tech Leader of Traveloka</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== end testimonials ====== -->

    <!-- ====== start blog ====== -->
<section class="blog section-padding bg-white style-1">
    <div class="container">
        <div class="row">
            <div class="col offset-lg-1">
                <div class="section-head mb-60">
                    <h6 class="color-main text-uppercase wow fadeInUp">our press</h6>
                    <h2 class="wow fadeInUp">
                        Latest Posts <span class="fw-normal">From Our Press</span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="blog_slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($blogs as $item)
                            <div class="swiper-slide">
                                <div class="blog_box">
                                    <div class="tags">
                                        <a href="#">{{ $item->kategori->nama ?? 'Uncategorized' }}</a>
                                    </div>
                                    <div class="img">
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
                                    </div>
                                    <div class="info">
                                        <h6><a href="{{ route('blog.detail', $item->id) }}">{{ $item->nama }}</a></h6>
                                        <div class="auther">
                                            <span>
                                                <img class="auther-img" src="{{ asset('assets/img/testimonials/user1.jpeg') }}" alt="">
                                                <small><a href="#">By Admin</a></small>
                                            </span>
                                            <span>
                                                <i class="bi bi-calendar2"></i>
                                                <small><a href="#">{{ $item->created_at->format('M d, Y') }}</a></small>
                                            </span>
                                        </div>
                                        <div class="text">
                                            {!! \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 100) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- slider navigation -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>

    <!-- ====== end blog ====== -->

<!-- ====== start clients ====== -->
<section class="clients style-5 pb-30">
<div class="container">
    <div class="section-head mb-60 text-center">
        
    </div></div>
    <div class="section-head text-center mb-40 style-5">
        <h2 class="mb-20"> <span> OTW </span> Clients </h2>
        <!-- <p>More than 15,000 companies trust and choose Iteck</p> -->
    </div>
    <div class="content">
        <div class="clients-slider5">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/p1.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/p2.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/p3.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/p4.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/p5.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/p6.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/p7.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/p8.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/p9.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/p10.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/p11.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/p12.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="section-head mb-60 text-center">
        
            </div>
        </div>
<div class="section-head text-center mb-40 style-5">
    <h2 class="mb-20"> <span> OTW </span> Support Ecosystem </h2>
    <!-- <p>More than 15,000 companies trust and choose Iteck</p> -->
</div>
        <div class="clients-slider5" dir="rtl">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/e1.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/e2.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/e3.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/e4.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/e5.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/e6.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/e7.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="section-head mb-60 text-center">
        
            </div>
        </div>
<div class="section-head text-center mb-40 style-5">
    <h2 class="mb-20"> <span> OTW </span> Education </h2>
    <!-- <p>More than 15,000 companies trust and choose Iteck</p> -->
</div>
        <div class="clients-slider5">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/s1.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/s2.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/s3.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/s4.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/s5.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/s6.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/s7.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/s8.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/s9.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/s10.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/s11.png" alt="">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#" class="img">
                            <img src="assets/img/support/s12.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== end clients ====== -->

</main>
    <!--End-Contents-->



    <!-- ====== start to top button ====== -->
        <a href="#" class="to_top">
            <i class="bi bi-chevron-up"></i>
            <small>top</small>
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