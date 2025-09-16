@extends('layouts.indexAdmin')

@section('title', 'Layanan')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen Layanan</h4>

  {{-- Baris aksi: Tambah (kiri) & Cari (kanan) --}}
  <div class="d-flex justify-content-between align-items-center gap-2 flex-wrap mb-3">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
      + Tambah Layanan
    </button>

    <form method="GET" action="{{ route('admin.layanan.index') }}" class="d-flex align-items-center gap-2 w-full">
        <input type="search"
                name="q"
                class="form-control"
                placeholder="Cari layanan/kategori…"
                value="{{ $q ?? request('q') }}"
                style="min-width:220px">

        <select name="kategori" class="form-select" style="min-width:180px">
            <option value="">-- Semua Kategori --</option>
            @foreach($kategoris as $kat)
            <option value="{{ $kat->id }}" {{ request('kategori') == $kat->id ? 'selected' : '' }}>
                {{ $kat->nama }}
            </option>
            @endforeach
        </select>

        @if(($q ?? request('q')) !== '' || request('kategori'))
            <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline-secondary">Reset</a>
        @endif

        <button type="submit" class="btn btn-primary d-flex align-items-center">
            <i class="bi bi-search me-2"></i> Cari
        </button>
        </form>

  </div>

  {{-- (Opsional) ringkasan total & keyword --}}
  @if(method_exists($layanans, 'total'))
    <div class="mb-2 small text-muted">
      Total: {{ $layanans->total() }}
      @if(($q ?? '') !== '')
        • Keyword: "<b>{{ $q }}</b>"
      @endif
    </div>
  @endif

  <!-- Tabel -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>Gambar</th>
          <th>Nama</th>
          <th>Kategori</th>
          <th>Deskripsi</th>
          <th style="width:180px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($layanans as $item)
          <tr>
            <td style="width:100px">
              @if($item->gambar)
                <img src="{{ asset('storage/'.$item->gambar) }}" width="80" class="img-thumbnail" alt="gambar">
              @endif
            </td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->kategori->nama ?? '-' }}</td>
            <td>{!! Str::limit(strip_tags($item->deskripsi), 80) !!}</td>
            <td>
              <button class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>

              <!-- Hapus pakai SweetAlert -->
              <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                @csrf @method('DELETE')
                <button type="button" class="btn btn-sm btn-danger btn-delete" data-name="{{ $item->nama }}">Hapus</button>
              </form>
            </td>
          </tr>

          <!-- Modal Edit -->
          <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content" style="overflow-y: auto">
                <form action="{{ route('admin.layanan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf @method('PUT')
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Kategori</label>
                      <select name="kategorilayanan_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kat)
                          <option value="{{ $kat->id }}" {{ $item->kategorilayanan_id == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Deskripsi</label>
                      <textarea name="deskripsi" class="form-control summernote">{!! $item->deskripsi !!}</textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Gambar</label><br>
                      @if($item->gambar)
                        <img src="{{ asset('storage/'.$item->gambar) }}" width="100" class="mb-2 img-thumbnail" alt="gambar">
                      @endif
                      <input type="file" name="gambar" class="form-control">
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
            <td colspan="5" class="text-center text-muted">
              @if(($q ?? '') !== '')
                Tidak ada hasil untuk "<b>{{ $q }}</b>". <a href="{{ route('admin.layanan.index') }}" class="ms-1">Reset</a>
              @else
                Belum ada layanan.
              @endif
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-3">
    {{ $layanans->links() }}
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content" style="overflow-y: auto">
      <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Layanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategorilayanan_id" class="form-control" required>
              <option value="">-- Pilih Kategori --</option>
              @foreach($kategoris as $kat)
                <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control summernote"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control">
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
