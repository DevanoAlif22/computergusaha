@extends('layouts.indexAdmin')

@section('title', 'Dashboard')

@section('content')
<div class="col-12">
  {{-- Header --}}
  <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
    <div>
      <h4 class="mb-1 fw-bold">Hai, {{ $me?->name ?? 'Admin' }} 👋</h4>
      <p class="text-muted mb-0">Selamat datang di panel admin</p>
    </div>
    <div>
      <a href="{{ route('admin.profile.index') }}" class="btn btn-outline-primary">
        <i class="bi bi-person-circle me-1"></i>Profil Saya
      </a>
    </div>
  </div>

  {{-- Stat Cards --}}
  <div class="row g-4 mb-5">
    <div class="col-6 col-lg-3">
      <div class="card border-0 shadow-sm h-100 hover-card">
        <div class="card-body d-flex align-items-center p-4">
          <div class="rounded-3 bg-primary bg-opacity-10 p-3 me-3">
            <i class="bi bi-people fs-3 text-primary"></i>
          </div>
          <div class="flex-grow-1">
            <p class="text-muted small mb-1">Users</p>
            <h4 class="mb-0 fw-bold">{{ number_format($stats['users']) }}</h4>
          </div>
          <a href="{{ url('users') }}" class="stretched-link"></a>
        </div>
      </div>
    </div>

    <div class="col-6 col-lg-3">
      <div class="card border-0 shadow-sm h-100 hover-card">
        <div class="card-body d-flex align-items-center p-4">
          <div class="rounded-3 bg-success bg-opacity-10 p-3 me-3">
            <i class="bi bi-diagram-3 fs-3 text-success"></i>
          </div>
          <div class="flex-grow-1">
            <p class="text-muted small mb-1">Kategori Layanan</p>
            <h4 class="mb-0 fw-bold">{{ number_format($stats['kategoriLayanan']) }}</h4>
          </div>
          <a href="{{ route('admin.kategori-layanan.index') }}" class="stretched-link"></a>
        </div>
      </div>
    </div>

    <div class="col-6 col-lg-3">
      <div class="card border-0 shadow-sm h-100 hover-card">
        <div class="card-body d-flex align-items-center p-4">
          <div class="rounded-3 bg-info bg-opacity-10 p-3 me-3">
            <i class="bi bi-wrench fs-3 text-info"></i>
          </div>
          <div class="flex-grow-1">
            <p class="text-muted small mb-1">Layanan</p>
            <h4 class="mb-0 fw-bold">{{ number_format($stats['layanan']) }}</h4>
          </div>
          <a href="{{ route('admin.layanan.index') }}" class="stretched-link"></a>
        </div>
      </div>
    </div>

    <div class="col-6 col-lg-3">
      <div class="card border-0 shadow-sm h-100 hover-card">
        <div class="card-body d-flex align-items-center p-4">
          <div class="rounded-3 bg-warning bg-opacity-10 p-3 me-3">
            <i class="bi bi-tags fs-3 text-warning"></i>
          </div>
          <div class="flex-grow-1">
            <p class="text-muted small mb-1">Category</p>
            <h4 class="mb-0 fw-bold">{{ number_format($stats['category']) }}</h4>
          </div>
          <a href="{{ route('admin.category.index') }}" class="stretched-link"></a>
        </div>
      </div>
    </div>

    <div class="col-6 col-lg-3">
      <div class="card border-0 shadow-sm h-100 hover-card">
        <div class="card-body d-flex align-items-center p-4">
          <div class="rounded-3 bg-secondary bg-opacity-10 p-3 me-3">
            <i class="bi bi-briefcase fs-3 text-secondary"></i>
          </div>
          <div class="flex-grow-1">
            <p class="text-muted small mb-1">Portofolio</p>
            <h4 class="mb-0 fw-bold">{{ number_format($stats['portofolio']) }}</h4>
          </div>
          <a href="{{ route('admin.portofolio.index') }}" class="stretched-link"></a>
        </div>
      </div>
    </div>

    <div class="col-6 col-lg-3">
      <div class="card border-0 shadow-sm h-100 hover-card">
        <div class="card-body d-flex align-items-center p-4">
          <div class="rounded-3 bg-danger bg-opacity-10 p-3 me-3">
            <i class="bi bi-collection fs-3 text-danger"></i>
          </div>
          <div class="flex-grow-1">
            <p class="text-muted small mb-1">Kategori Blog</p>
            <h4 class="mb-0 fw-bold">{{ number_format($stats['kategoriBlog']) }}</h4>
          </div>
          <a href="{{ route('admin.kategori-blog.index') }}" class="stretched-link"></a>
        </div>
      </div>
    </div>

    <div class="col-6 col-lg-3">
      <div class="card border-0 shadow-sm h-100 hover-card">
        <div class="card-body d-flex align-items-center p-4">
          <div class="rounded-3 bg-dark bg-opacity-10 p-3 me-3">
            <i class="bi bi-journal-text fs-3 text-dark"></i>
          </div>
          <div class="flex-grow-1">
            <p class="text-muted small mb-1">Blog</p>
            <h4 class="mb-0 fw-bold">{{ number_format($stats['blog']) }}</h4>
          </div>
          <a href="{{ route('admin.blog.index') }}" class="stretched-link"></a>
        </div>
      </div>
    </div>
  </div>

  {{-- Recent Data Section --}}
  <div class="row g-4">
    {{-- Blog Terbaru --}}
    <div class="col-lg-6">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-transparent border-0 py-3">
          <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 fw-bold">
              <i class="bi bi-journal-text me-2 text-primary"></i>Blog Terbaru
            </h6>
            <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-outline-primary">
              <i class="bi bi-arrow-right me-1"></i>Lihat semua
            </a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead class="bg-light">
                <tr>
                  <th class="border-0 py-3 px-4">Judul</th>
                  <th class="border-0 py-3 px-4">Kategori</th>
                  <th class="border-0 py-3 px-4 text-end">Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @forelse($recent['blogs'] as $b)
                  <tr>
                    <td class="px-4 py-3">
                      <div class="text-truncate fw-medium" style="max-width:200px">
                        {{ $b->nama }}
                      </div>
                    </td>
                    <td class="px-4 py-3">
                      <span class="badge bg-light text-dark">{{ $b->kategori->nama ?? '-' }}</span>
                    </td>
                    <td class="px-4 py-3 text-end">
                      <small class="text-muted">{{ $b->created_at?->format('d M Y') }}</small>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="3" class="text-center py-5 text-muted">
                      <i class="bi bi-journal-x fs-1 d-block mb-2"></i>
                      Belum ada data blog
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    {{-- Layanan Terbaru --}}
    <div class="col-lg-6">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-transparent border-0 py-3">
          <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 fw-bold">
              <i class="bi bi-wrench me-2 text-success"></i>Layanan Terbaru
            </h6>
            <a href="{{ route('admin.layanan.index') }}" class="btn btn-sm btn-outline-success">
              <i class="bi bi-arrow-right me-1"></i>Lihat semua
            </a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead class="bg-light">
                <tr>
                  <th class="border-0 py-3 px-4">Nama</th>
                  <th class="border-0 py-3 px-4">Kategori</th>
                  <th class="border-0 py-3 px-4 text-end">Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @forelse($recent['layanan'] as $l)
                  <tr>
                    <td class="px-4 py-3">
                      <div class="text-truncate fw-medium" style="max-width:200px">
                        {{ $l->nama }}
                      </div>
                    </td>
                    <td class="px-4 py-3">
                      <span class="badge bg-light text-dark">{{ $l->kategori->nama ?? '-' }}</span>
                    </td>
                    <td class="px-4 py-3 text-end">
                      <small class="text-muted">{{ $l->created_at?->format('d M Y') }}</small>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="3" class="text-center py-5 text-muted">
                      <i class="bi bi-wrench fs-1 d-block mb-2"></i>
                      Belum ada data layanan
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    {{-- Portofolio Terbaru --}}
    <div class="col-12">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-transparent border-0 py-3">
          <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 fw-bold">
              <i class="bi bi-briefcase me-2 text-info"></i>Portofolio Terbaru
            </h6>
            <a href="{{ route('admin.portofolio.index') }}" class="btn btn-sm btn-outline-info">
              <i class="bi bi-arrow-right me-1"></i>Lihat semua
            </a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead class="bg-light">
                <tr>
                  <th class="border-0 py-3 px-4">Judul</th>
                  <th class="border-0 py-3 px-4 text-end">Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @forelse($recent['projects'] as $p)
                  <tr>
                    <td class="px-4 py-3">
                      <div class="text-truncate fw-medium" style="max-width:500px">
                        {{ $p->nama ?? $p->title ?? '—' }}
                      </div>
                    </td>
                    <td class="px-4 py-3 text-end">
                      <small class="text-muted">{{ $p->created_at?->format('d M Y') }}</small>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="2" class="text-center py-5 text-muted">
                      <i class="bi bi-briefcase fs-1 d-block mb-2"></i>
                      Belum ada data portofolio
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
.hover-card {
  transition: transform 0.2s ease-in-out;
}

.hover-card:hover {
  transform: translateY(-2px);
}

.card .stretched-link::after {
  z-index: 1;
}

.table th {
  font-weight: 600;
  font-size: 0.875rem;
}

.table td {
  vertical-align: middle;
}
</style>
@endsection
