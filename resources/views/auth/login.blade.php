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
    <title>OTW Computer Gusaha - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}" title="Favicon" sizes="16x16" />

    <!-- ====== bootstrap icons cdn ====== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}">

    <!-- ====== font family ====== -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/lib/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery.fancybox.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/lity.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/swiper.min.css') }}" />

    <!-- ====== global style ====== -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>

    <!--Contents-->
    <main class="signin-page style-5">

        <!-- ====== start signin section ====== -->
        <section class="signin style-5">
            <div class="container">
                <div class="form-content">
                    <div class="row gx-0">
                        <!-- Form Login -->
                        <div class="col-lg-6 order-last order-lg-first">
                            <div class="info">
                                <a href="#" class="logo">
                                    <img src="{{ asset('assets/img/logo_otw.png') }}" alt="Logo OTW">
                                </a>
                                <h3 class="mb-2"> Selamat Datang Kembali <span class="color-blue5"> OTW </span> </h3>
                                <p class="color-666"> Silahkan Login untuk masuk ke Dashboard </p>
                                <br>

                                <!-- Form -->
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group group-icon">
                                                <input id="email" type="email" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                                                <span class="icon"> <i class="fas fa-envelope"></i> </span>
                                                @error('email')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group group-icon mt-3 mt-lg-0">
                                                <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>
                                                <span class="icon"> <i class="fas fa-key"></i> </span>
                                                @error('password')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Remember Me -->
                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                        <label class="form-check-label" for="remember_me">
                                            Ingat saya
                                        </label>
                                    </div>

                                    <!-- Button -->
                                    <button type="submit" class="butn bg-main border-0 rounded-3 w-100 text-white mt-20 py-3">
                                        <span> Sign In Now <i class="fal fa-long-arrow-right ms-2"></i> </span>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Gambar Slider -->
                        <div class="col-lg-6">
                            <div class="sign-imgs-slider">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <div class="swiper-slide">
                                                <div class="slide-card">
                                                    <div class="img">
                                                        <img src="{{ asset('assets/img/logo_otw/'.$i.'.png') }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end signin section ====== -->

    </main>
    <!--End-Contents-->

    <!-- ====== start to top button ====== -->
    <a href="#" class="to_top bg-gray rounded-circle icon-40 d-inline-flex align-items-center justify-content-center">
        <i class="bi bi-chevron-up fs-6 text-dark"></i>
    </a>
    <!-- ====== end to top button ====== -->

    <!-- ====== JS ====== -->
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
</body>
</html>
