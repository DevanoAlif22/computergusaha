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
    
    <!-- ====== start sidemenu navbar ====== -->
    <div class="side_menu style-7" id="side_menu">
        <a href="#0" class="side_menu_cls">
            <img src="assets/img/icons/4dots.png" alt="">
        </a>
        <div class="content">
            <div class="logo">
                <a href="#" class="w-100">
                    <img src="assets/img/logo_otw.png" alt="">
                </a>
            </div>
            <div class="pages_links">
                <ul>
                    <li><a href="#" class="active">Home</a></li>
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
    <!-- ====== end sidemenu navbar ====== -->



    <!--Contents-->
    <main class="careers-page style-5 pt-10">
        <!-- ====== start careers positions ====== -->
        <section class="careers-positions pb-100">
            <div class="container">
                <div class="section-head text-center mb-60 style-5">
                    <h2 class="mb-20"> Mari Berkarir bersama <span> OTW </span> </h2>
                    <!-- <div class="text color-666">More than 15,000 companies trust and choose Itech</div> -->
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <a href="#" class="position-card mb-4">
                            <h5> Marketing Digital </h5>
                                <p> Kami sedang mencari Digital Marketing untuk bergabung bersama tim kami. </p>
                            <div class="time">
                                <span class="me-4"> <i class="fal fa-clock me-1 color-main"></i> Full-time </span>
                                <span> <i class="fal fa-file me-1 color-main"></i> Subject-MD </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="#" class="position-card mb-4">
                            <h5> Programmer </h5>
                            <p> Kami sedang mencari programmer berbakat untuk mengembangkan sistem kami. </p>
                            <div class="time">
                                <span class="me-4"> <i class="fal fa-clock me-1 color-main"></i> Full-time </span>
                                <span> <i class="fal fa-file me-1 color-main"></i> Subject-PG</span>
                            </div>
                            <span class="trend-mark"> <i class="fas fa-bolt"></i> </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end careers positions ====== -->

        <!-- ====== start career form ====== -->
        <section class="career-form section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-numbers">
                            <h2> Kirim Lamaranmu </h2>
                            <!-- <p> More than 15,000 companies trust and choose Itech </p> -->
                            <!-- <div class="career-numbers mt-50">
                                <div class="row gx-5">
                                    <div class="col-5">
                                        <div class="mum-card">
                                            <h3> <span class="counter"> 5000 </span> </h3>
                                            <small> Project Completed </small>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="mum-card">
                                            <h3> <span class="counter"> 1 </span> M+ </h3>
                                            <small> Happy Users </small>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="mum-card">
                                            <h3> <span class="counter"> 100 </span> </h3>
                                            <small> Team Members </small>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="mum-card">
                                            <h3> <span class="counter"> 10 </span> </h3>
                                            <small> Offline Basement </small>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="contact.php" class="form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" placeholder="Nama Lengkap">
                                        <span class="icon"> <i class="fas fa-user"></i> </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" placeholder="Email">
                                        <span class="icon"> <i class="fas fa-envelope"></i> </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" placeholder="Nomor HP">
                                        <span class="icon"> <i class="fas fa-phone"></i> </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4 upload-card">
                                        <div class="form-control">
                                            <span id="upload_text"> <i class="fas fa-cloud"></i> Upload CV</span>
                                            <input type="file" class="upload_input">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-4">
                                        <textarea rows="7" class="form-control" placeholder="Isi Pesan"></textarea>
                                        <span class="icon"> <i class="fas fa-pen"></i> </span>
                                    </div>
                                </div>
                            </div>
                            <button class="btn bg-white sm-butn mt-4 rounded-3">
                                <span class="text-dark"> Kirim Lamaran <i class="fal fa-long-arrow-right ms-2 color-blue5"></i> </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <img src="assets/img/careers/map.png" alt="" class="map_img">
        </section>
        <!-- ====== end career form ====== -->

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