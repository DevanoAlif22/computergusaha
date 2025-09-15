@extends('layouts.indexAdmin')

@section('title', 'Kategori Blog')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen Kategori Blog</h4>


  {{-- Baris aksi: Tambah (kiri) & Cari (kanan) --}}
<div class="d-flex justify-content-between align-items-center gap-2 flex-wrap mb-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
    + Tambah Kategori
  </button>

  <form method="GET" action="{{ route('admin.kategori-blog.index') }}" class="d-flex align-items-center gap-2 ms-auto">
    <input type="search"
           name="q"
           class="form-control"
           placeholder="Cari kategori…"
           value="{{ $q ?? request('q') }}"
           style="min-width:260px">
    @if(($q ?? request('q')) !== null && ($q ?? request('q')) !== '')
      <a href="{{ route('admin.kategori-blog.index') }}" class="btn btn-outline-secondary">Reset</a>
    @endif
    <button type="submit" class="d-flex btn btn-primary">
      <i class="bi bi-search me-2"></i> Cari
    </button>
  </form>
</div>

  <!-- Tabel -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th style="width:80px;">#</th>
          <th>Nama</th>
          <th style="width:180px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($kategoris as $kat)
          @php
            $start = method_exists($kategoris, 'firstItem') ? ($kategoris->firstItem() ?? 0) : 0;
          @endphp
          <tr>
            <td>{{ $start ? $start + $loop->index : $loop->iteration }}</td>
            <td>{{ $kat->nama }}</td>
            <td>
              <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $kat->id }}">Edit</button>

              {{-- Hapus pakai SweetAlert2 --}}
              <form action="{{ route('admin.kategori-blog.destroy', $kat->id) }}" method="POST" class="d-inline delete-form">
                @csrf @method('DELETE')
                <button type="button" class="btn btn-sm btn-danger btn-delete" data-name="{{ $kat->nama }}">Hapus</button>
              </form>
            </td>
          </tr>

          <!-- Modal Edit -->
          <div class="modal fade" id="editModal{{ $kat->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{ route('admin.kategori-blog.update', $kat->id) }}" method="POST">
                  @csrf @method('PUT')
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control" value="{{ old('nama', $kat->nama) }}" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        @empty
          <tr>
            <td colspan="3" class="text-center text-muted">
              @if(($q ?? '') !== '')
                Tidak ada hasil untuk "<b>{{ $q }}</b>".
                <a href="{{ route('admin.kategori-blog.index') }}" class="ms-1">Reset pencarian</a>
              @else
                Belum ada kategori.
              @endif
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  @if(method_exists($kategoris, 'links'))
    <div class="mt-3">
      {{ $kategoris->links() }}
    </div>
  @endif
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('admin.kategori-blog.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required placeholder="Misal: Pengumuman">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  {{-- SweetAlert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- Flash: success --}}
  @if(session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: @json(session('success')),
      timer: 2000,
      showConfirmButton: false
    });
  </script>
  @endif

  {{-- Flash: errors --}}
  @if($errors->any())
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Gagal',
      html: `{!! implode('<br>', $errors->all()) !!}`
    });
  </script>
  @endif

  {{-- Konfirmasi hapus --}}
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function (e) {
          e.preventDefault();
          const form = this.closest('form');
          const name = this.dataset.name || 'data ini';
          Swal.fire({
            title: 'Yakin hapus?',
            html: `Anda akan menghapus <b>${name}</b>.<br> Tindakan ini tidak bisa dibatalkan!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
            }
          });
        });
      });
    });
  </script>
@endsection
