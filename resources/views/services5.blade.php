@extends('layouts.app')

@section('title', 'Layanan Kami')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="OTW Computer Gusaha" />
    <meta name="description" content="Daftar Layanan Kami" />
    <meta name="author" content="" />

    <!-- Title  -->
    <title>Layanan Kami - OTW Computer Gusaha</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/fav.png" title="Favicon" sizes="16x16" />

    <!-- ====== bootstrap icons cdn ====== -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        <!-- ====== start layanan ====== -->
        <section class="portfolio-projects section-padding pt-50 style-1">
            <div class="container">
                <div class="section-head text-center mb-60 style-5">
                    <h2 class="mb-20"> Layanan <span>Kami</span> </h2>
                    <p>Berikut layanan yang kami tawarkan untuk mendukung bisnis Anda.</p>
                </div>

                <!-- tombol filter -->
                <div class="controls text-center mb-40">
                    <button type="button" class="control" data-filter="all">All</button>
                    @foreach ($categories as $category)
                        <button type="button" class="control" data-filter=".{{ Str::slug($category->nama) }}">
                            {{ $category->nama }}
                        </button>
                    @endforeach
                </div>

                <section class="portfolio style-1">
                    <div class="content">
                        <div class="row mix-container">
                            @foreach ($data as $item)
                                <div class="col-lg-4 mix {{ $item->kategori ? Str::slug($item->kategori->nama) : '' }}">
                                    <div class="portfolio-card mb-50">
                                        <div class="img">
                                            <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('assets/img/default.jpg') }}"
                                                 alt="{{ $item->nama }}">
                                        </div>

                                        <div class="info">
                                            <h5>{{ $item->nama }}</h5>
                                            <div class="mt-3">
                                              <span style="background:none; color:#0d6efd; font-weight:600; text-transform:uppercase; text-decoration:none; font-size:14px;">
    {{ $item->kategori ? $item->kategori->nama : 'Umum' }}
</span>

                                            </div>
                                          <div class="text">
    {!! $item->deskripsi !!}
</div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="#" class="btn rounded-pill blue5-3Dbutn hover-blue2 sm-butn fw-bold mt-30">
                            <span>Lihat Semua</span>
                        </a>
                    </div>
                </section>
            </div>
        </section>
        <!-- ====== end layanan ====== -->
    </main>
    <!--End-Contents-->

    <!-- ====== start to top button ====== -->
    <a href="#"
       class="to_top bg-gray rounded-circle icon-40 d-inline-flex align-items-center justify-content-center">
        <i class="bi bi-chevron-up fs-6 text-dark"></i>
    </a>
    <!-- ====== end to top button ====== -->

    <!-- ====== scripts ====== -->
    <script src="assets/js/lib/jquery-3.0.0.min.js"></script>
    <script src="assets/js/lib/jquery-migrate-3.0.0.min.js"></script>
    <script src="assets/js/lib/bootstrap.bundle.min.js"></script>
    <script src="assets/js/lib/wow.min.js"></script>
    <script src="assets/js/lib/jquery.fancybox.js"></script>
    <script src="assets/js/lib/lity.js"></script>
    <script src="assets/js/lib/swiper.min.js"></script>
    <script src="assets/js/lib/jquery.waypoints.min.js"></script>
    <script src="assets/js/lib/jquery.counterup.js"></script>
    <script src="assets/js/lib/mixitup.min.js"></script>
    <script src="assets/js/lib/scrollIt.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        // aktifkan mixitup untuk filter kategori
        var containerEl = document.querySelector('.mix-container');
        if (containerEl) {
            var mixer = mixitup(containerEl);
        }
    </script>

</body>
</html>
@endsection
