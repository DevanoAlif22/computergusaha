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
    <main class="about-page style-2">

        <!-- ====== start careers-features ====== -->
        <section class="about style-2 section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="img img-cover">
                            <img src="assets/img/about/about2.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info px-lg-5">
                            <div class="section-head style-5 mb-40">
                                <h2 class="mb-20"> OTW <span> Computer </span> </h2>
                            </div>
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="abt1-tab" data-bs-toggle="pill" data-bs-target="#abt1" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                                        Our Vision 
                                  </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="abt2-tab" data-bs-toggle="pill" data-bs-target="#abt2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                        Our Mission
                                  </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="abt3-tab" data-bs-toggle="pill" data-bs-target="#abt3" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                            Legality
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="abt1" role="tabpanel">
                                    <p class="text">  Menjadi mitra terkemuka dalam memberikan solusi teknologi informasi yang inovatif dan dapat diandalkan, membantu pelanggan mencapai kesuksesan melalui penerapan teknologi yang efektif. </p>
                                    <div class="d-flex align-items-center mt-40">
                                        <div class="btns">
                                            <a href="#" class="btn rounded-pill blue5-3Dbutn hover-blue2 sm-butn fw-bold">
                                                <span> Learn More </span>
                                            </a>
                                        </div>
                                        <div class="inf ms-3">
                                            <p class="color-999"> Support Email </p>
                                            <a href="#" class="fw-bold color-000"> otwcomputer@gusaha.id </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="abt2" role="tabpanel">
                                <ul style="padding-left:20px; margin:0;">
                                    <li>Menyediakan solusi teknologi informasi berkualitas yang sesuai dengan kebutuhan dan harapan pelanggan.</li>
                                    <li>Terus berinovasi dalam mengembangkan solusi teknologi informasi yang canggih dan relevan, membantu pelanggan menghadapi tantangan bisnis modern.</li>
                                    <li>Selain berfokus pada bisnis, kami juga berusaha untuk memberikan manfaat positif kepada masyarakat melalui inisiatif sosial dan dalam lingkungan pendidikan.</li>
                                </ul>
                                    <div class="d-flex align-items-center mt-40">
                                        <div class="btns">
                                            <a href="#" class="btn rounded-pill blue5-3Dbutn hover-blue2 sm-butn fw-bold">
                                                <span> Learn More </span>
                                            </a>
                                        </div>
                                        <div class="inf ms-3">
                                            <p class="color-999"> Support Email </p>
                                            <a href="#" class="fw-bold color-000"> otwcomputer@gusaha.id </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="abt3" role="tabpanel">
                                <table>
                                <tr>
                                    <td style="width:180px;">Nama perusahaan</td>
                                    <td style="width:20px;">:</td>
                                    <td>CV. OTW Computer Gusaha.</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>Maspion IT Lt 1 Blok F 12 Jln. Ahmad Yani no 73 Surabaya Jln. Pesawon 55C Semampir Sedati Sidoarjo</td>
                                </tr>
                                <tr>
                                    <td>NIB</td>
                                    <td>:</td>
                                    <td>1223000332628</td>
                                </tr>
                                <tr>
                                    <td>NPWP PKP</td>
                                    <td>:</td>
                                    <td>418249371643000</td>
                                </tr>
                                <tr>
                                    <td>PSE Kominfo</td>
                                    <td>:</td>
                                    <td>006650.01/DJAI.PSE/08/2022</td>
                                </tr>
                                <tr>
                                    <td>Nomor PB-UMKU</td>
                                    <td>:</td>
                                    <td>122300033262800000001</td>
                                </tr>
                                </table>
                                    <div class="d-flex align-items-center mt-40">
                                        <div class="btns">
                                            <a href="#" class="btn rounded-pill blue5-3Dbutn hover-blue2 sm-butn fw-bold">
                                                <span> Learn More </span>
                                            </a>
                                        </div>
                                        <div class="inf ms-3">
                                            <p class="color-999"> Support Email </p>
                                            <a href="#" class="fw-bold color-000"> otwcomputer@gusaha.id </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="assets/img/about/about2_pattern_l.png" alt="" class="pattern_l">
            <img src="assets/img/about/about2_pattern_r.png" alt="" class="pattern_r">
        </section>
        <!-- ====== end careers-features ====== -->

        <!-- ====== start latar belakang CEO ====== -->
        <div style="text-align:center; margin:40px 0;">
        <h2 style="margin-bottom:20px;">CEO & Founder</h2>
        
        <!-- Foto CEO berbentuk lingkaran -->
        @foreach($ceos as $ceo)
    <!-- Foto CEO berbentuk lingkaran -->
    <img src="{{ asset('storage/' . $ceo->gambar) }}" 
         alt="Foto CEO" 
         style="width:150px; height:150px; border-radius:50%; object-fit:cover;">

    <!-- Nama & Jabatan -->
    <h3 style="margin-top:15px; margin-bottom:5px;">{{ $ceo->nama }}</h3>

    <!-- Deskripsi -->
<div style="max-width: 800px; margin: 20px auto; padding: 0 20px; text-align: justify; line-height: 1.6;">
    {!! $ceo->deskripsi !!}
</div>

        @endforeach

        </div>
        <!-- ====== end latar belakang CEO ====== -->

        <!-- ====== start timeline ====== -->
        <section class="timeline section-padding" style="background-color: white;">
            <div class="container">
                <div class="section-head text-center mb-70 style-5">
                    <h2 class="mb-20"> Journey Was <span> Started </span> </h2>
                    <p>OTW COMPUTER</p>
                </div>
             <div class="timeline-content">
    @foreach($journeys as $index => $journey)
        <div class="timeline-card">
            <div class="row justify-content-around align-items-center">
                <div class="col-lg-4">
                    <div class="card-year text-lg-end wow left_to_right_apperance">
                        <h3>{{ $journey->tahun }}</h3>
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="card-info wow left_to_right_apperance">
                        <h6>{{ $journey->nama }}</h6>
                        <p>{!! $journey->deskripsi !!}</p>
                        <span class="num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    </div> 
                </div>
            </div>
            <div class="line wow"></div>
        </div>
    @endforeach
</div>

            </div>
        </section>
        <!-- ====== end timeline ====== -->

       
        <!-- ====== start services ====== -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <section class="services section-padding bg-white">
    <div class="container">
        <div class="section-head text-center mb-70 style-5">
            <h2 class="mb-3"> Our <span>Services</span> </h2>
            <p class="text-muted" style="font-size: 18px; margin: 0;">
                Layanan terbaik untuk mendukung kebutuhan bisnis Anda
            </p>
        </div>

        <div class="row text-center">
            @foreach($layanans as $layanan)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="p-4 border rounded shadow-sm h-100">
                        
                        {{-- tampilkan icon/gambar --}}
                        <div style="margin-bottom:15px;">
                            @if($layanan->gambar)
                                <img src="{{ asset('storage/' . $layanan->gambar) }}" 
                                     alt="{{ $layanan->nama }}" 
                                     style="width:60px; height:60px; object-fit:contain;">
                            @else
                                <i class="fa-solid fa-gears" style="font-size:40px;"></i>
                            @endif
                        </div>

                        {{-- nama layanan --}}
                        <h5 class="mb-3">{{ $layanan->nama }}</h5>
                        
                        {{-- deskripsi layanan --}}
                        {!! Str::limit(strip_tags($layanan->deskripsi), 80) !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

        <!-- ====== end services ====== -->

        <!-- ====== start career form ====== -->
    <section class="clients-imgs ">
    <div class="container">
        <div class="section-head text-center style-5">
            <h2 class="mb-20"> Our <span> Partners </span> </h2>
        </div>

        <section class="clients-imgs pt-10" align="center">
            <table align="center" cellspacing="0">
                @foreach($partners->chunk(4) as $row)
                    <tr>
                        @foreach($row as $partner)
                            <td style="padding: 10px;">
                                <img src="{{ asset('storage/' . $partner->gambar) }}" 
                                     alt="Partner Logo" 
                                     width="120">
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </section>

        <h5 class="text-center mt-50"> 
            More <span class="color-blue5"> 15,000 </span> Companies & partners trusted & choice Itekseo 
        </h5>
    </div>

    <div class="about2-imgs-slider pt-100">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#" class="img img-cover">
                        <img src="assets/img/about/about2_1.png" alt="">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="img img-cover">
                        <img src="assets/img/about/about2_2.png" alt="">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="img img-cover">
                        <img src="assets/img/about/about2_3.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- ====== end career form ====== -->

        <!-- ====== start blog ====== -->
        <section class="blog style-8">
    <div class="container">
        <div class="content section-padding">
            <div class="section-head text-center mb-70 style-5">
                <h2 class="mb-20"> News & <span> Insights </span> </h2>
                <p>More than 15,000 companies trust and choose Itech</p>
            </div>
            <div class="blog-content">
                <div class="row">
                    
                    {{-- blog pertama tampil besar --}}
                    @if($blogs->count() > 0)
                        @php $mainBlog = $blogs->first(); @endphp
                        <div class="col-lg-6">
                            <div class="main-post wow fadeInUp">
                                <div class="img img-cover">
                                    <img src="{{ asset('storage/' . $mainBlog->gambar) }}" alt="{{ $mainBlog->nama }}">
                                    <div class="tags">
                                        <a href="">
                                            {{ $mainBlog->kategori->nama ?? 'General' }}
                                        </a>
                                    </div>
                                </div>
                                <div class="info pt-30">
                                    <div class="date-author">
                                        <a href="#" class="date">
                                            {{ $mainBlog->created_at->format('M d, Y') }}
                                        </a>
                                        <span class="color-999 mx-3"> | </span>
                                        <a href="#" class="author color-999">
                                            By <span class="color-000 fw-bold"> Admin </span>
                                        </a>
                                    </div>
                                    <h4 class="title">
                                        <a href="{{ route('blog.detail', $mainBlog->id) }}">
                                            {{ $mainBlog->nama }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- sisanya tampil kecil di samping --}}
                    <div class="col-lg-6">
                        <div class="side-posts">
                            @foreach($blogs->skip(1) as $index => $blog)
                                <div class="item wow fadeInUp" data-wow-delay="{{ $index * 0.2 }}s">
                                    <div class="img img-cover">
                                        <img src="{{ asset('storage/' . $blog->gambar) }}" alt="{{ $blog->nama }}">
                                    </div>
                                    <div class="info">
                                        <div class="date-author">
                                            <a href="#" class="date">
                                                {{ $blog->created_at->format('M d, Y') }}
                                            </a>
                                            <span class="color-999 mx-3"> | </span>
                                            <a href="#" class="author color-999">
                                                By <span class="color-000 fw-bold"> Admin </span>
                                            </a>
                                        </div>
                                        <h4 class="title">
                                            <a href="{{ route('blog.detail', $blog->id) }}">
                                                {{ $blog->nama }}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

        <!-- ====== end blog ====== -->

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

    <script>
        $('.upload_input').on('change', function(event) {
            var files = event.target.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                $("#upload_text").html(file.name).css("color" , "#fff")
                // $("<div class='file_value'><div class='filevalue--text'>" + file.name + "</div><div class='file_value--remove' data-id='" + file.name + "' ></div></div>").insertAfter('#upload_text');
            }
        });
    </script>

</body>

</html>
@endsection