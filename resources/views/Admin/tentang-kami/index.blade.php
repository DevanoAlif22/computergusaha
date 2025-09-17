@extends('layouts.indexAdmin')

@section('title', 'Tentang Kami')

@section('content')
<div class="container">
  <h4 class="mb-3">Tentang Kami</h4>
  <p class="text-muted mb-4">Halaman ini berisi daftar menu statis. Klik “Kelola” untuk masuk ke halaman masing-masing.</p>

  <div class="row g-3">
    {{-- CEO --}}
    <div class="col-md-6 col-lg-3">
      <div class="card h-100 shadow-sm">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-person-badge fs-3 me-2"></i>
            <h5 class="card-title mb-0">CEO</h5>
          </div>
          <p class="card-text text-muted flex-grow-1">
            Profil CEO, foto, biografi singkat, dan visi misi.
          </p>
          {{-- <a href="{{ route('admin.tentang.ceo.index') }}"
             class="btn btn-primary mt-auto">
            Kelola
          </a> --}}
          <a href="{{ route('admin.ceo.index') }}"
             class="btn btn-primary mt-auto">
            Kelola
          </a>
        </div>
      </div>
    </div>

    {{-- Journey --}}
    <div class="col-md-6 col-lg-3">
      <div class="card h-100 shadow-sm">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-flag fs-3 me-2"></i>
            <h5 class="card-title mb-0">Journey</h5>
          </div>
          <p class="card-text text-muted flex-grow-1">
            Timeline perjalanan perusahaan dan milestone penting.
          </p>
          {{-- <a href="{{ route('admin.tentang.journey.index') }}"
             class="btn btn-primary mt-auto">
            Kelola
          </a> --}}
          <a href="{{ route('admin.journey.index') }}"
             class="btn btn-primary mt-auto">
            Kelola
          </a>
        </div>
      </div>
    </div>

    {{-- Partners --}}
    <div class="col-md-6 col-lg-3">
      <div class="card h-100 shadow-sm">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-people fs-3 me-2"></i>
            <h5 class="card-title mb-0">Partners</h5>
          </div>
          <p class="card-text text-muted flex-grow-1">
            Daftar mitra/klien, logo, dan deskripsi singkat kolaborasi.
          </p>
          {{-- <a href="{{ route('admin.tentang.partners.index') }}"
             class="btn btn-primary mt-auto">
            Kelola
          </a> --}}
          <a href="{{ route('admin.partner.index') }}"
             class="btn btn-primary mt-auto">
            Kelola
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
