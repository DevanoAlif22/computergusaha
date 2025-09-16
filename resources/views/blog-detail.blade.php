@extends('layouts.app')

@section('title', $blog->nama)

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
    <title>{{ $blog->nama }} - OTW Computer Gusaha</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}" title="Favicon" sizes="16x16" />

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" 
        integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}">

    <!-- Font Family -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Library CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery.fancybox.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/lity.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/swiper.min.css') }}" />

    <!-- Global Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>

    <!-- ====== Start Sidemenu Navbar ====== -->
    <div class="side_menu style-7" id="side_menu">
        <a href="#0" class="side_menu_cls">
            <img src="{{ asset('assets/img/icons/4dots.png') }}" alt="">
        </a>
        <div class="content">
            <div class="logo">
                <a href="#" class="w-100">
                    <img src="{{ asset('assets/img/logo_otw.png') }}" alt="">
                </a>
            </div>
            <div class="pages_links">
                <ul>
                    <li><a href="/" class="active">Home</a></li>
                    <li><a href="#">about</a></li>
                    <li><a href="#">services</a></li>
                    <li><a href="#">portfolio</a></li>
                    <li><a href="#">blog</a></li>
                    <li><a href="#">contact</a></li>
                    <li><a href="#">shop</a></li>
                </ul>
            </div>
            <div class="side_foot">
                <h5> get in touch </h5>
                <div class="row">
                    <div class="col-lg-6">
                        <a href="#"> <i class="fal fa-phone-alt me-2"></i> 08238444812 </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="#"> <i class="fal fa-envelope me-2 mt-4 mt-lg-0"></i> info@gusaha.id </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="side_overlay"></div>
    <!-- ====== End Sidemenu Navbar ====== -->

    <!-- ====== Blog Detail Content ====== -->
    <main class="blog-detail-page style-5 pt-10">
        <section class="blog-detail pb-100">
            <div class="container">
                <div class="section-head mb-60 style-5 text-start">
                    <h2 class="mb-20">{{ $blog->nama }}</h2>
                       <div class="mt-4">
                        @if($blog->kategori)
                            <p>
                                <i class="fal fa-folder me-2 color-main"></i> Kategori: {{ $blog->kategori->nama }}
                            </p>
                        @endif
                        <p>
                            <i class="bi bi-eye me-1"></i> Dilihat: {{ $blog->dilihat }}
                        </p>
                        </div>

                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="blog-card rounded-4 bg-white text-start">
                            @if($blog->gambar)
                                <img src="{{ asset('storage/' . $blog->gambar) }}" alt="{{ $blog->nama }}" class="img-fluid rounded mb-4">
                            @endif
                            <div class="text-start">
                                {!! $blog->deskripsi !!}
                            </div>

                         
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ====== Scroll To Top Button ====== -->
    <a href="#" class="to_top bg-gray rounded-circle icon-40 d-inline-flex align-items-center justify-content-center">
        <i class="bi bi-chevron-up fs-6 text-dark"></i>
    </a>

    <!-- ====== Scripts ====== -->
    <script src="{{ asset('assets/js/lib/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/lib/lity.js') }}"></script>
    <script src="{{ asset('assets/js/lib/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery.counterup.js') }}"></script>
    <script src="{{ asset('assets/js/lib/scrollIt.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 200) {
                    $('.to_top').fadeIn();
                } else {
                    $('.to_top').fadeOut();
                }
            });

            $('.to_top').click(function (e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: 0 }, 600);
            });
        });
    </script>

</body>
</html>

@endsection
