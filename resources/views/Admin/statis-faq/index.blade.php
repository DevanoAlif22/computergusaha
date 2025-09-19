@extends('layouts.indexAdmin')

@section('title', 'FAQ')

@section('content')
<div class="container">
  <h4 class="mb-3">FAQ</h4>
  <p class="text-muted mb-4">Halaman ini berisi daftar menu statis untuk manajemen FAQ. Klik “Kelola” untuk masuk ke halaman masing-masing.</p>

  <div class="row g-3">
    {{-- Kategori FAQ --}}
    <div class="col-md-6 col-lg-3">
      <div class="card h-100 shadow-sm">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-tags fs-3 me-2"></i>
            <h5 class="card-title mb-0">Kategori FAQ</h5>
          </div>
          <p class="card-text text-muted flex-grow-1">
            Kelola kategori untuk mengelompokkan pertanyaan.
          </p>
          <a href="{{ route('admin.faq-category.index') }}" class="btn btn-primary mt-auto">
            Kelola
          </a>
        </div>
      </div>
    </div>

    {{-- FAQ --}}
    <div class="col-md-6 col-lg-3">
      <div class="card h-100 shadow-sm">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-question-circle fs-3 me-2"></i>
            <h5 class="card-title mb-0">FAQ</h5>
          </div>
          <p class="card-text text-muted flex-grow-1">
            Tambah & edit pertanyaan yang sering diajukan.
          </p>
          <a href="{{ route('admin.faq.index') }}" class="btn btn-primary mt-auto">
            Kelola
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
