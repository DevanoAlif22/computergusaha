<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Admin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/styleadmin.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/styleadmin.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Admin
  * Template URL: https://bootstrapmade.com/admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="images/logo_otw.png" alt="">
        <span class="d-none d-lg-block"> Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
    <li class="nav-item dropdown pe-3">
      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        @php
          $me = auth()->user();
          $avatar = $me?->avatar
            ? asset('storage/'.$me->avatar)
            : asset('assets/img/profile-img.jpg'); // fallback
        @endphp
        <img src="{{ $avatar }}" alt="Profile" class="rounded-circle" style="object-fit:cover; width:36px; height:36px;">
        <span class="d-none d-md-block dropdown-toggle ps-2">
          {{ $me?->name ?? 'User' }}
        </span>
      </a>

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6 class="mb-0">{{ $me?->name ?? 'User' }}</h6>
          <span class="text-muted small">
            {{ $me?->email ?? '—' }}
          </span>
        </li>

        <li><hr class="dropdown-divider"></li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
            <i class="bi bi-person me-2"></i>
            <span>Profil Saya</span>
          </a>
        </li>

        <li><hr class="dropdown-divider"></li>

        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item d-flex align-items-center">
              <i class="bi bi-box-arrow-right me-2"></i>
              <span>Keluar</span>
            </button>
          </form>
        </li>
      </ul>
    </li>
  </ul>
</nav>

  </header><!-- End Header -->

   <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    {{-- Dashboard --}}
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.profile.*') ? '' : 'collapsed' }}"
            href="{{ route('admin.profile.index') }}">
            <i class="bi bi-person-circle"></i>
            <span>Profil Saya</span>
        </a>
    </li>

    <li class="nav-heading">Manajemen Konten</li>

    {{-- Kategori Layanan --}}
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.kategori-layanan.*') ? '' : 'collapsed' }}" href="{{ route('admin.kategori-layanan.index') }}">
        <i class="bi bi-diagram-3"></i>
        <span>Kategori Layanan</span>
      </a>
    </li>

    {{-- Layanan --}}
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.layanan.*') ? '' : 'collapsed' }}" href="{{ route('admin.layanan.index') }}">
        <i class="bi bi-wrench"></i>
        <span>Layanan</span>
      </a>
    </li>

    {{-- Category (umum/katalog) --}}
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.category.*') ? '' : 'collapsed' }}" href="{{ route('admin.category.index') }}">
        <i class="bi bi-tags"></i>
        <span>Category</span>
      </a>
    </li>

    {{-- Portofolio --}}
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.portofolio.*') ? '' : 'collapsed' }}" href="{{ route('admin.portofolio.index') }}">
        <i class="bi bi-briefcase"></i>
        <span>Portofolio</span>
      </a>
    </li>

    {{-- Kategori Blog --}}
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.kategori-blog.*') ? '' : 'collapsed' }}" href="{{ route('admin.kategori-blog.index') }}">
        <i class="bi bi-collection"></i>
        <span>Kategori Blog</span>
      </a>
    </li>

    {{-- Blog --}}
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.blog.*') ? '' : 'collapsed' }}" href="{{ route('admin.blog.index') }}">
        <i class="bi bi-journal-text"></i>
        <span>Blog</span>
      </a>
    </li>

    {{-- Halaman Statis (jika nanti pakai resource pages.*, sesuaikan) --}}
    <li class="nav-item">
      <a class="nav-link collapsed" href="pages.html">
        <i class="bi bi-file-earmark-text"></i>
        <span>Halaman Statis</span>
      </a>
    </li>

    {{-- Kontak --}}
    <li class="nav-item">
      <a class="nav-link collapsed" href="contacts.html">
        <i class="bi bi-envelope"></i>
        <span>Kontak</span>
      </a>
    </li>

    {{-- <li class="nav-heading">Manajemen Pengguna</li> --}}

    {{-- Users (kalau sudah ada route users.* bisa di-aktifkan state-nya) --}}
    {{-- <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('users.*') ? '' : 'collapsed' }}" href="{{ url('users') }}">
        <i class="bi bi-people"></i>
        <span>User</span>
      </a>
    </li> --}}

    <li class="nav-heading">Pengaturan</li>

    {{-- Settings (kalau nanti ada route settings.* tinggal ganti href + state) --}}
    <li class="nav-item">
      <a class="nav-link collapsed" href="settings.html">
        <i class="bi bi-sliders"></i>
        <span>Pengaturan Website</span>
      </a>
    </li>
  </ul>
</aside>
  <!-- End Sidebar -->



  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Admin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/mainAdmin.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>
