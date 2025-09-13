<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title', 'Dashboard') - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/styleadmin.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/styleadmin.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url('admin') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('images/logo_otw.png') }}" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Users</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Admin</h6>
              <span>Web Manager</span>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item d-flex align-items-center">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Keluar</span>
                </button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="dashboard.html">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Manajemen Konten</li>

    <!-- Services -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="services.html">
        <i class="bi bi-gear"></i>
        <span>Services</span>
      </a>
    </li><!-- End Services Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="services.html">
        <i class="bi bi-gear"></i>
        <span>Category</span>
      </a>
    </li><!-- End Services Nav -->

    <!-- Portfolio (gunakan route Laravel) -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.portofolio.index') }}">
        <i class="bi bi-briefcase"></i>
        <span>Portofolio</span>
      </a>
    </li><!-- End Portfolio Nav -->

    <!-- Blog / Artikel -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="blog.html">
        <i class="bi bi-journal-text"></i>
        <span>Blog</span>
      </a>
    </li><!-- End Blog Nav -->

    <!-- Halaman Statis -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="pages.html">
        <i class="bi bi-file-earmark-text"></i>
        <span>Halaman Statis</span>
      </a>
    </li><!-- End Pages Nav -->

    <!-- Kontak -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="contacts.html">
        <i class="bi bi-envelope"></i>
        <span>Kontak</span>
      </a>
    </li><!-- End Contacts Nav -->

    <li class="nav-heading">Manajemen Pengguna</li>

    <!-- User Management -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="users.html">
        <i class="bi bi-person"></i>
        <span>User</span>
      </a>
    </li><!-- End User Nav -->

    <li class="nav-heading">Pengaturan</li>

    <!-- Settings -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="settings.html">
        <i class="bi bi-sliders"></i>
        <span>Pengaturan Website</span>
      </a>
    </li><!-- End Settings Nav -->

  </ul>
</aside>
<!-- End Sidebar -->


  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">
        @yield('content')
      </div>
    </section>

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Admin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/mainAdmin.js') }}"></script>

</body>
</html>
