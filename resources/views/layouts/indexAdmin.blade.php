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

  <!-- Summernote CSS (global) -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.css" rel="stylesheet">
  <style>
    /* tinggi minimal area edit */
    .note-editor .note-editable { min-height: 220px; }
  </style>

  @yield('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="d-flex flex-column min-vh-100">

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

  </header>
  <!-- End Header -->

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


    {{-- Halaman Statis --}}
    <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#statis-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-earmark-text"></i>
        <span>Halaman Statis</span>
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="statis-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
        <a href="" class="{{ request()->is('admin/pages/tentang-kami') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Tentang Kami</span>
        </a>
        </li>
        <li>
        <a href="" class="{{ request()->is('admin/pages/faq') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>FAQ</span>
        </a>
        </li>
    </ul>
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

  <main id="main" class="main flex-grow-1">
    <section class="section dashboard">
      <div class="row">
        @yield('content')
      </div>
    </section>
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer mt-auto">
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

  <!-- jQuery (wajib untuk Summernote) -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
          integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
          crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/mainAdmin.js') }}"></script>

  <!-- Summernote JS -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.js"></script>

  <!-- Summernote Init (global) -->
  <script>
  console.log('[indexAdmin] Summernote init loaded');

  // setup CSRF untuk semua AJAX jQuery
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
  });

  window.addEventListener('load', function () {
    console.log('[indexAdmin] window.load fired');

    const options = {
      placeholder: 'Tulis deskripsi…',
      tabsize: 2,
      height: 220,
      toolbar: [
        ['style',    ['style']],
        ['font',     ['bold', 'italic', 'underline', 'clear']],
        ['para',     ['ul', 'ol', 'paragraph']],
        ['insert',   ['link', 'picture']], // picture tetap, tapi kita override upload-nya
        ['view',     ['codeview']]
      ],
      callbacks: {
        // Upload jika user memilih gambar dari file picker
        onImageUpload: function(files) {
          const editor = $(this);
          for (let i = 0; i < files.length; i++) {
            uploadImage(files[i], function(url) {
              editor.summernote('insertImage', url);
            });
          }
        },
        // Cegah paste gambar base64 (opsional: supaya konten tetap ringan)
        onPaste: function(e) {
          const clipboard = (e.originalEvent || e).clipboardData;
          if (!clipboard) return;

          // Kalau ada item bertipe image di clipboard → cegah default (base64)
          for (let i = 0; i < clipboard.items.length; i++) {
            if (clipboard.items[i].type.indexOf('image') !== -1) {
              e.preventDefault();
              // Kamu bisa juga upload gambar dari clipboard di sini kalau mau
              // dengan clipboard.items[i].getAsFile() lalu panggil uploadImage(...)
              alert('Tempel gambar langsung dinonaktifkan. Gunakan tombol "Insert image".');
              return;
            }
          }
        }
      }
    };

    function uploadImage(file, done) {
      const formData = new FormData();
      formData.append('file', file);

      $.ajax({
        url: "{{ route('admin.upload.summernote') }}",
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
          if (res && res.url) {
            done(res.url);
          } else {
            alert('Upload gagal: respons tidak valid.');
          }
        },
        error: function (xhr) {
          console.error('Upload error:', xhr);
          alert('Gagal mengunggah gambar.');
        }
      });
    }

    // Init semua .summernote
    if (typeof $ !== 'undefined' && $.fn && $.fn.summernote) {
      $('.summernote').each(function () {
        const $el = $(this);
        if (!$el.next().hasClass('note-editor')) {
          $el.summernote(options);
        }
      });
    }
  });
</script>

  @yield('scripts')
</body>
</html>
