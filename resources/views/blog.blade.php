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
    <main class="blog-page style-5 color-4">


        <!-- ====== start blog-slider ====== -->
<section class="blog-slider pt-50 pb-50 style-1">
    <div class="container">
        <div class="section-head text-center mb-60 style-4">
            <h2 class="mb-20"> Our <span> Journal </span> </h2>
            <div class="text color-666">
                Get the latest articles from our journal, writing, discuss and share
            </div>
        </div>
        <div class="blog-details-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($allBlogs as $blog)
                        <div class="swiper-slide">
                            <div class="content-card">
                                <div class="img overlay">
                                    <img src="{{ asset('storage/'.$blog->gambar) }}" alt="{{ $blog->nama }}">
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="cont">
                                                <small class="date small mb-20">
                                                    {{-- tampilkan id & nama kategori --}}
                                                      <small class="text-uppercase border-end brd-gray pe-3 me-3">
                                                            {{ $blog->kategori->nama ?? 'Tanpa Kategori' }}
                                                        </small>

                                                    <i class="far fa-clock me-1"></i>
                                                    Posted on <a href="#">{{ $blog->created_at->diffForHumans() }}</a>
                                                </small>
                                                <h2 class="title">
                                                    <a href="{{ route('blog.detail', $blog->id) }}">
                                                        {{ $blog->nama }}
                                                    </a>
                                                </h2>
                                                <p class="fs-13px mt-10 text-light text-info">
                                                    {!! Str::limit(strip_tags($blog->deskripsi), 100) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- ====== pagination ====== -->
            <div class="swiper-pagination"></div>
            <!-- ====== arrows ====== -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>


        <!-- ====== end blog-slider ====== -->


        <!-- ====== start Popular Posts ====== -->
        <section class="popular-posts pt-50 pb-100 border-bottom brd-gray">
    <div class="container">
        <h5 class="post-sc-title text-center text-uppercase mb-70">Popular Posts</h5>
        <div class="row gx-5">
            @foreach($popularBlogs as $item)
                <div class="col-lg-4 {{ !$loop->last ? 'border-end brd-gray' : '' }}">
                    <div class="card border-0 bg-transparent rounded-0 mb-30 mb-lg-0 d-block">
                        <div class="img radius-7 overflow-hidden img-cover">
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}">
                        </div>
                        <div class="card-body px-0">
                            <small class="d-block date mt-10 fs-10px fw-bold">
                                <span class="text-uppercase border-end brd-gray pe-3 me-3 color-blue4">
                                    {{ $item->kategori->nama ?? 'Tanpa Kategori' }}
                                </span>
                                <i class="bi bi-clock me-1"></i>
                                <span class="op-8">
                                    {{ $item->created_at->diffForHumans() }}
                                </span>
                            </small>
                            <h5 class="fw-bold mt-10 title">
                                <a href="{{ route('blog.detail', $item->id) }}">{{ $item->nama }}</a>
                            </h5>
                            <p class="small mt-2 op-8 fs-10px">
                                {{ Str::limit(strip_tags($item->deskripsi), 100, '...') }}
                            </p>
                            <div class="d-flex small mt-20 align-items-center justify-content-between op-9">
                                <div class="l_side d-flex align-items-center">
                                    <span class="icon-20 rounded-circle d-inline-flex justify-content-center align-items-center text-uppercase bg-main p-1 me-2 text-white">
                                        a
                                    </span>
                                    <span class="mt-1">By Admin</span>
                                </div>
                                <div class="r-side mt-1">
                                    {{-- <i class="bi bi-chat-left-text me-1"></i>
                                    <span>24</span> statis --}}
                                    <i class="bi bi-eye ms-4 me-1"></i>
                                    <span>{{ $item->dilihat }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
        </section>

        <!-- ====== end Popular Posts ====== -->


        <!-- ====== start all-news ====== -->
        <section class="all-news section-padding blog bg-transparent style-3">
            <div class="container">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-4">
                        <div class="side-blog style-5 pe-lg-5 mt-5 mt-lg-0">
                            <form action="contact.php" class="search-form mb-50" method="post">
                                <h6 class="title mb-20 text-uppercase fw-normal">
                                    search
                                </h6>
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control rounded-pill" placeholder="Type and hit enter">
                                    <button class="search-btn border-0 bg-transparent"> <i class="fas fa-search"></i> </button>
                                </div>
                            </form>

                      <div class="side-recent-post mb-50">
                            <h6 class="title mb-20 text-uppercase fw-normal">
                                recent post
                            </h6>
                            @foreach($recentPosts as $item)
                                <a href="{{ route('blog.detail', $item->id) }}" class="post-card pb-3 mb-3 border-bottom brd-gray {{ $loop->last ? 'mb-0 border-0' : '' }}">
                                    <div class="img me-3">
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
                                    </div>
                                    <div class="inf">
                                        <h6>{{ $item->nama }}</h6>
                                        <p>{{ Str::limit(strip_tags($item->deskripsi), 50, '...') }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>


                     <div class="side-categories mb-50">
    <h6 class="title mb-20 text-uppercase fw-normal">categories</h6>

    {{-- Link All (jumlah semua blog) --}}
    <a href="{{ route('blog.index') }}" class="cat-item">
        <span>All</span>
        <span>{{ $blogs->total() }}</span>
    </a>

    {{-- Looping kategori --}}
    @foreach($categories as $cat)
        <a href="" class="cat-item {{ $loop->last ? 'border-0' : '' }}">
            <span>{{ $cat->nama }}</span>
            <span>{{ $cat->blogs_count }}</span>
        </a>
    @endforeach
</div    v>


                            <div class="side-newsletter mb-50">
                                <h6 class="title mb-10 text-uppercase fw-normal">
                                    newsletter
                                </h6>
                                <div class="text">
                                    Register now to get latest updates on promotions & coupons.
                                </div>
                                <form action="contact.php" class="form-subscribe" method="post">
                                    <div class="email-input d-flex align-items-center py-3 px-3 bg-white mt-3 radius-5">
                                        <span class="icon me-2 flex-shrink-0">
                                            <i class="far fa-envelope"></i>
                                        </span>
                                        <input type="text" placeholder="Email Address" class="border-0 bg-transparent fs-13px">
                                    </div>
                                    <button class="btn bg-blue4 sm-butn text-white hover-darkBlue w-100 mt-3 radius-5 py-3">
                                        <span>Subscribe</span>
                                    </button>
                                </form>
                            </div>

                            <div class="side-share mb-50">
                                <h6 class="title mb-20 text-uppercase fw-normal">
                                    social
                                </h6>
                                <a href="#" class="social-icon">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-icon">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-icon">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                                <a href="#" class="social-icon">
                                    <i class="fab fa-goodreads-g"></i>
                                </a>
                                <a href="#" class="social-icon">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>

                            <div class="side-insta mb-50">
                                <h6 class="title mb-20 text-uppercase fw-normal">
                                    our instagram
                                </h6>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <a href="assets/img/blog/1.jpeg" class="insta-img img-cover" data-fancybox="gallery">
                                        <img src="assets/img/blog/1.jpeg" alt="">
                                        <i class="fab fa-instagram icon"></i>
                                    </a>
                                    <a href="assets/img/blog/10.png" class="insta-img img-cover" data-fancybox="gallery">
                                        <img src="assets/img/blog/10.png" alt="">
                                        <i class="fab fa-instagram icon"></i>
                                    </a>
                                    <a href="assets/img/blog/11.png" class="insta-img img-cover" data-fancybox="gallery">
                                        <img src="assets/img/blog/11.png" alt="">
                                        <i class="fab fa-instagram icon"></i>
                                    </a>
                                    <a href="assets/img/blog/12.png" class="insta-img img-cover" data-fancybox="gallery">
                                        <img src="assets/img/blog/12.png" alt="">
                                        <i class="fab fa-instagram icon"></i>
                                    </a>
                                    <a href="assets/img/blog/2.jpeg" class="insta-img img-cover" data-fancybox="gallery">
                                        <img src="assets/img/blog/2.jpeg" alt="">
                                        <i class="fab fa-instagram icon"></i>
                                    </a>
                                    <a href="assets/img/blog/3.jpeg" class="insta-img img-cover" data-fancybox="gallery">
                                        <img src="assets/img/blog/3.jpeg" alt="">
                                        <i class="fab fa-instagram icon"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="side-tags">
                                <h6 class="title mb-20 text-uppercase fw-normal">
                                    popular tags
                                </h6>
                                <div class="content">
                                    <a href="#">WordPress</a>
                                    <a href="#">PHP</a>
                                    <a href="#">HTML/CSS</a>
                                    <a href="#">Figma</a>
                                    <a href="#">Technology</a>
                                    <a href="#">Marketing</a>
                                    <a href="#">Consultation</a>
                                    <a href="#">Seo</a>
                                    <a href="#">Envato</a>
                                    <a href="#">Psd</a>
                                </div>
                            </div>
                        </div>
                    </div>
               <div class="col-lg-8">
    @foreach($blogs as $blog)
        <div class="card border-0 bg-transparent rounded-0 border-bottom brd-gray pb-30 mb-30">
            <div class="row">
                {{-- Gambar --}}
                <div class="col-lg-5">
                    <div class="img img-cover">
                        <img src="{{ $blog->gambar ? asset('storage/'.$blog->gambar) : asset('assets/img/default.jpg') }}"
                            class="radius-7" alt="{{ $blog->nama }}">
                    </div>
                </div>

                {{-- Konten --}}
                <div class="col-lg-7">
                    <div class="card-body p-0">
                        {{-- Kategori & Waktu --}}
                        <small class="d-block date text">
                            <span class="text-uppercase border-end brd-gray pe-3 me-3 color-blue4 fw-bold">
                                {{ $blog->kategori->nama ?? 'Tanpa Kategori' }}
                            </span>
                            <i class="bi bi-clock me-1"></i>
                            <span class="op-8">{{ $blog->created_at->diffForHumans() }}</span>
                        </small>

                        {{-- Judul --}}
                        <a href="{{ route('blog.detail', $blog->id) }}" class="card-title mb-10 d-block fw-bold fs-5">
                            {{ $blog->nama }}
                        </a>

                        {{-- Deskripsi singkat --}}
                        <p class="fs-13px color-666">
                            {{ Str::limit(strip_tags($blog->deskripsi), 100, '...') }}
                        </p>

                        {{-- Admin + Komentar statis + Views --}}
                        <div class="auther-comments d-flex small align-items-center justify-content-between op-9">
                            <div class="l_side d-flex align-items-center">
                                <span class="icon-10 rounded-circle d-inline-flex justify-content-center align-items-center text-uppercase bg-blue4 p-2 me-2 text-white">
                                    A
                                </span>
                                <span>
                                    <small class="text-muted">By</small> Admin
                                </span>
                            </div>
                            <div class="r-side mt-1">
                                <i class="bi bi-chat-left-text me-1"></i>
                                <span>24</span> {{-- komentar statis --}}
                                <i class="bi bi-eye ms-4 me-1"></i>
                                <span>{{ $blog->dilihat ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $blogs->links('layouts.custom-pagination') }}
    </div>
                </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- ====== end all-news ====== -->

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