@extends('layouts.app')

@section('title', $portfolio->judul ?? 'Detail Portfolio')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ $portfolio->judul ?? 'Portfolio Detail' }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <main class="portfolio-page style-1">
        <!-- ====== start portfolio detail ====== -->
        <section class="portfolio-details section-padding pt-50 style-1">
            <div class="container">
                <div class="row">
                    <!-- gambar utama -->
                    <div class="col-lg-7">
                        <div class="portfolio-img mb-40">
                            <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('assets/img/projects/prog/1.jpeg') }}" 
                                 alt="{{ $item->judul }}" 
                                 class="img-fluid rounded-3 shadow">
                        </div>
                    </div>
                    
                    <!-- informasi detail -->
                    <div class="col-lg-5">
                        <div class="portfolio-info ps-lg-4">
                            <h2 class="mb-3">{{ $item->judul }}</h2>
                            <ul class="list-unstyled mb-4">
                                <li><strong>Kategori:</strong> {{ $item->category ? $item->category->name : '-' }}</li>
                               
                            </ul>
                            <p class="text-muted mb-4">
                                {!! $item->deskripsi ?? 'Tidak ada deskripsi.' !!}
                            </p>
                            

                            <a href="{{ url('/portfolio') }}" 
                               class="btn rounded-pill blue5-3Dbutn hover-blue2 sm-butn fw-bold mt-30">
                                <span><i class="bi bi-arrow-left me-2"></i> Kembali ke Portfolio</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- ====== end portfolio detail ====== -->
        
    </main>

    <script src="{{ asset('assets/js/lib/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
@endsection
