<!-- ====== start top navbar ====== -->
<div class="top-navbar style-7">
    <div class="container">
        <div class="row justify-content-between gx-0">
            <div class="col-7">
                <div class="top_info">
                    <!-- Email -->
                    <a href="mailto:{{ $pengaturan->email }}" class="me-4"> 
                        <i class="fas fa-envelope-open me-1 color-blue7"></i>
                        <span>{{ $pengaturan->email }}</span>    
                    </a>
                    <!-- Nomor WA -->
                    <a href="https://wa.me/{{ $pengaturan->nomor }}"> 
                        <i class="fas fa-phone me-1 color-blue7"></i>
                        <span>{{ $pengaturan->nomor }}</span>    
                    </a>
                </div>
            </div>
            <div class="col-5">
                <div class="side_links d-flex justify-content-lg-end">
                    <a href="{{ url('/karir') }}" class="me-4">Karir</a>
                    <a href="{{ url('/faq') }}" class="me-4">Faq</a>
                    <a href="{{ url('/login') }}" class="me-4">Login</a>
                    <div class="dropdown border-1 border-start ps-4">
                        <a class="dropdown-toggle fw-bold" href="#" id="navbarDropdown1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Indonesia
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" href="#0"> English </a></li>
                            <li><a class="dropdown-item" href="#0"> Jawa </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ====== end top navbar ====== -->


<!-- ====== start navbar ====== -->
<nav class="navbar navbar-expand-lg navbar-light style-7">
    <div class="container">
        <!-- Logo Website dari DB -->
        <a class="navbar-brand" href="{{ url('/') }}">
            @if($pengaturan && $pengaturan->logo)
                <img src="{{ asset('storage/' . $pengaturan->logo) }}" 
                     alt="{{ $pengaturan->nama_website }}">
            @else
                <span>{{ $pengaturan->nama_website ?? 'Nama Website' }}</span>
            @endif
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Layanan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <li><a class="dropdown-item" href="{{ url('/servicesdetailsowa') }}">OTW WhatsApp API</a></li>
                        <li><a class="dropdown-item" href="{{ url('/servicesdetailsoaku') }}">OTW Akuntansi</a></li>
                        <li><a class="dropdown-item" href="{{ url('/servicesdetailsodigi') }}">OTW Digital</a></li>
                        <li><a class="dropdown-item" href="{{ url('/servicesdetailsomail') }}">OTW Bisnis Email</a></li>
                        <li><a class="dropdown-item" href="{{ url('/servicesdetails') }}">OTW Digital Pengadaan</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/portfolio') }}">Portofolio</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about2') }}">Tentang Kami</a>
                </li>
            </ul>

            <div class="nav-side">
                <div class="qoute-nav ps-4">
                    <!-- Logo Kedua -->
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('assets/img/logo_tdt.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- ====== end navbar ====== -->


<!-- ====== start loading page ====== -->
<div id="preloader">
    <div id="loading-wrapper" class="show">
      <div id="loading-text">
        @if($pengaturan && $pengaturan->logo)
            <img src="{{ asset('storage/' . $pengaturan->logo) }}" alt="">
        @else
            <span>{{ $pengaturan->nama_website ?? 'Loading...' }}</span>
        @endif
      </div>
      <div id="loading-content"></div>
    </div>
</div>
<!-- ====== end loading page ====== -->
