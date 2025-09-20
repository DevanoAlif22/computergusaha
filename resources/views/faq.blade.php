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
    <main class="faq-page style-5 section-padding">

        <!-- ====== start faq-tabs style-5 ====== -->
        <section class="faq-tabs style-5">
            <div class="container">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-card active" id="faq1-tab" data-bs-toggle="pill" data-bs-target="#faq1" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            <div class="icon img-contain">
                                <img src="assets/img/icons/users.png" alt="">
                            </div>
                            <div class="info">
                                <h5> About Account </h5>
                                <p> 08 Answer </p>
                            </div>
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-card" id="faq2-tab" data-bs-toggle="pill" data-bs-target="#faq2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        <div class="icon img-contain">
                            <img src="assets/img/icons/protect.png" alt="">
                        </div>
                        <div class="info">
                            <h5> Privacy & Policy </h5>
                            <p> 20 Answer </p>
                        </div>
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-card" id="faq3-tab" data-bs-toggle="pill" data-bs-target="#faq1" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                        <div class="icon img-contain">
                            <img src="assets/img/icons/dollar.png" alt="">
                        </div>
                        <div class="info">
                            <h5> Refund Option </h5>
                            <p> 18 Answer </p>
                        </div>
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-card" id="faq4-tab" data-bs-toggle="pill" data-bs-target="#faq2" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <div class="icon img-contain">
                                <img src="assets/img/icons/24hour.png" alt="">
                            </div>
                            <div class="info">
                                <h5> Support & More </h5>
                                <p> 33 Answer </p>
                            </div>
                        </button>
                    </li>
                </ul>
            </div>
        </section>
        <!-- ====== end faq-tabs style-5 ====== -->


        <!-- ====== end faq-body style-5 ====== -->
     <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="faq1" role="tabpanel">
        <div class="faq-body">
            <div class="container">
                <div class="row gx-5">
                    {{-- Sidebar Kategori --}}
                    <div class="col-lg-4">
    <div class="faq-category">
        <h5> Question Category: </h5>
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="javascript:void(0)" 
                       class="category-link {{ $loop->first ? 'active' : '' }}"
                       data-target="accordion{{ $loop->index }}">
                       {{ $category->nama }}
                    </a>
                    <span>{{ $category->faqs->count() }}</span>
                </li>
            @endforeach
        </ul>
    </div>
                    </div>


                    {{-- Konten FAQ --}}
                    <div class="col-lg-8">
    <div class="faq-questions">
        @foreach($categories as $category)
            <div class="accordion category-content" id="accordion{{ $loop->index }}">
                <h5 class="sec-title">
                    <span>{{ str_pad($loop->index + 1, 2, '0', STR_PAD_LEFT) }}.</span> 
                    {{ $category->nama }}
                </h5>

                @foreach($category->faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $faq->id }}">
                            <button class="accordion-button collapsed" type="button" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#collapse{{ $faq->id }}" 
                                aria-expanded="false" 
                                aria-controls="collapse{{ $faq->id }}">
                                {{ $faq->pertanyaan }}
                            </button>
                        </h2>
                        <div id="collapse{{ $faq->id }}" 
                             class="accordion-collapse collapse" 
                             aria-labelledby="heading{{ $faq->id }}" 
                             data-bs-parent="#accordion{{ $loop->parent->index }}">
                            <div class="accordion-body">
                                <div class="text">
                                    {!! $faq->jawaban !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
                </div>
            </div>
        </div>
        </div>
    </div>

    {{-- Tab FAQ2 tetap manual --}}
    <div class="tab-pane fade" id="faq2" role="tabpanel">
        {{-- copy paste struktur yg sama, atau manual seperti punyamu --}}
    </div>
</div>

        <!-- ====== end faq-body style-5 ====== -->
        
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
document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.category-link');
    const navbarHeight = document.querySelector('header')?.offsetHeight || 80; // tinggi navbar (default 80px)

    links.forEach(link => {
        link.addEventListener('click', function () {
            const targetId = this.dataset.target;
            const target = document.getElementById(targetId);

            // reset active
            document.querySelectorAll('.category-link').forEach(l => l.classList.remove('active'));
            this.classList.add('active');

            if (target) {
                const targetPosition = target.getBoundingClientRect().top + window.scrollY - navbarHeight - 20; 
                // -20 biar ada jarak tambahan
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});
</script>



</body>

</html> 
@endsection